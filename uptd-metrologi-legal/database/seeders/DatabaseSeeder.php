<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdasd'),
            'role' => IS_ADMIN
        ]);

        \DB::table('tb_pengujian')->insert([
            'nomor_pengujian' => '510.3/.157/Disperindag',
            'alat_ukur_yang_diuji' => '7 (tujuh) unit Timbangan Elektronik',
            'pemilik' => 'PT. INTIMAS SURYA',
            'alamat_pemilik' => 'Jl. Ikan Tuna Raya, Kelurahan Pedungan - Denpasar Selatan',
            'tanggal_pengujian' => '2022-02-04',
            'metoda_pengujian' => 'Perbandingan Langsung',
            'standar_pengujian' => 'Anak Timbangan Standar',
            'hasil_pengujian' => 'Disahkan Untuk Tera Ulang Tahun 2022 berdasarkan Undang-Undang RI No. 2 Tahun 1981 tentang Metrologi Legal',
            'berlaku_sampai_dengan' => '2022-02-01',
            'telepon' => '6283114403610',
            'harga' => 1000000
        ]);

        \DB::table('tb_pengujian_penguji')->insert([
            'pengujian_id' => 1,
            'nama' => 'I Wayan Suta, SH',
            'nip' => '196212311983021064',
        ]);

        \DB::table('tb_pengujian_penguji')->insert([
            'pengujian_id' => 1,
            'nama' => 'I Wayan Suta, SH',
            'nip' => '197012311991031031',
        ]);

        \DB::table('tb_pengujian_alat')->insert([
            'pengujian_id' => 1,
            'jenis_uttp' => 'Alat Ukur Panjang',
            'nama_alat' => 'Nama Alat',
            'kapasitas_skala_terkecil' => '10 kg / 0,005 kg',
            'merk_model' => 'AND / SK - 10 KWP',
            'no_seri' => 'No. 1',
            'keterangan' => 'Sah "22"'
        ]);

        \DB::table('tb_pengujian_alat')->insert([
            'pengujian_id' => 1,
            'jenis_uttp' => 'Alat Ukur Panjang',
            'nama_alat' => 'Nama Alat',
            'kapasitas_skala_terkecil' => '1000 g / 0,5 g',
            'merk_model' => 'AND / SK - 1000 WP',
            'no_seri' => 'No. 1 C',
            'keterangan' => 'Sah "22"'
        ]);

        \DB::table('tb_pengujian_alat')->insert([
            'pengujian_id' => 1,
            'jenis_uttp' => 'Alat Ukur Panjang',
            'nama_alat' => 'Nama Alat',
            'kapasitas_skala_terkecil' => '20 kg / 0,01 kg',
            'merk_model' => 'AND / SK - 20 KWP',
            'no_seri' => 'No. 2',
            'keterangan' => 'Sah "22"'
        ]);

        \DB::table('tb_pengujian_alat')->insert([
            'pengujian_id' => 1,
            'jenis_uttp' => 'Alat Ukur Panjang',
            'nama_alat' => 'Nama Alat',
            'kapasitas_skala_terkecil' => '1000 g / 0,5 g',
            'merk_model' => 'AND / SK - 1000 WP',
            'no_seri' => 'No. 11',
            'keterangan' => 'Sah "22"'
        ]);

        \DB::table('tb_pengujian_alat')->insert([
            'pengujian_id' => 1,
            'jenis_uttp' => 'Alat Ukur Panjang',
            'nama_alat' => 'Nama Alat',
            'kapasitas_skala_terkecil' => '5000 g / 1 g',
            'merk_model' => 'AND / SK - 5001 WP',
            'no_seri' => 'No. 5',
            'keterangan' => 'Sah "22"'
        ]);

        \DB::table('tb_pengujian_alat')->insert([
            'pengujian_id' => 1,
            'jenis_uttp' => 'Alat Ukur Panjang',
            'nama_alat' => 'Nama Alat',
            'kapasitas_skala_terkecil' => '150 kg / 5 g',
            'merk_model' => 'EXCELLENT / A12E',
            'no_seri' => 'No. 21',
            'keterangan' => 'Sah "22"'
        ]);

        \DB::table('tb_pengujian_alat')->insert([
            'pengujian_id' => 1,
            'jenis_uttp' => 'Alat Ukur Panjang',
            'nama_alat' => 'Nama Alat',
            'kapasitas_skala_terkecil' => '20 kg / 0,1 kg',
            'merk_model' => 'AND / SK - 20 KWP',
            'no_seri' => 'No. 18',
            'keterangan' => 'Sah "22"'
        ]);
    }
}
