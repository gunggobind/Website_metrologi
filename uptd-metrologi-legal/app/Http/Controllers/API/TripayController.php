<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\TopUp;
use App\Models\User;

class TripayController extends Controller
{
    protected $privateKey = 'i9ErB-v9Ap6-0NPoB-biID2-dBGvx';

    public function callback(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return 'Invalid signature';
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return 'Invalid callback event, no action was taken';
        }

        $data = json_decode($json);
        $merchantRef = $data->merchant_ref;

        $invoice = TopUp::find($merchantRef)
            ->where('id', $data->merchant_ref)
            ->where('status', 'UNPAID')
            ->first();

        if (! $invoice) {
            return 'Invoice not found or current status is not UNPAID';
        }

        if ((int) $data->total_amount !== (int) $invoice['results']['amount']) {
            return 'Invalid amount';
        }

        switch ($data->status) {
            case 'PAID':
                $invoice->update([
                    'status' => 'PAID',
                    'callback' => json_encode($request->all(), true)
                ]);
                User::find($invoice->user_id)->update([
                    'token_bcn' => User::find($invoice->user_id)->token_bcn + $invoice->token_bcn
                ]);
                return response()->json(['success' => true]);

            case 'EXPIRED':
                $invoice->update(['status' => 'EXPIRED']);
                return response()->json(['success' => true]);

            case 'FAILED':
                $invoice->update(['status' => 'FAILED']);
                return response()->json(['success' => true]);

            default:
                return 'Unrecognized payment status';
        }
    }
}
