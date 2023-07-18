<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Konfigurasi;

class KonfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $konfigurasi = [
            ['nama' => 'nama', 'tipe' => 'text', 'label' => 'Nama', 'deskripsi' => 'Sistem Informasi Pegawai', 'urutan'    => '1'],
            ['nama' => 'singkatan', 'tipe' => 'text', 'label' => 'Nama Singkat', 'deskripsi' => 'SIMPEG', 'urutan'    => '2'],
            ['nama' => 'tagline', 'tipe' => 'text', 'label' => 'Tagline', 'deskripsi' => 'Transfer Knowledge For Better Life', 'urutan'   => '3'],
            ['nama' => 'deskripsi', 'tipe' => 'textarea', 'label' => 'Deskripsi', 'deskripsi' => 'Sistem Informasi Pegawai(SIMPEG) adalah ....', 'urutan' => '4'],
            ['nama' => 'tahun', 'tipe' => 'text', 'label' => 'Tahun', 'deskripsi' => '2020', 'urutan' => '5'],
            ['nama' => 'url', 'tipe' => 'text', 'label' => 'URL Website', 'deskripsi' => 'https://www.lighthinkstudio.com', 'urutan'   => '6'],
            ['nama' => 'telepon', 'tipe' => 'text', 'label' => 'Telepon', 'deskripsi' => '62 857 2929 1988', 'urutan' => '7'],
            ['nama' => 'fax', 'tipe' => 'text', 'label' => 'Fax', 'deskripsi' => '62 857 2929 1988', 'urutan' => '8'],
            ['nama' => 'email', 'tipe' => 'text', 'label' => 'Email', 'deskripsi' => 'cs@lighthinkstudio.com', 'urutan' => '9'],
            ['nama' => 'jalan', 'tipe' => 'text', 'label' => 'Jalan', 'deskripsi' => 'Jl. Raya Citayam Gg. Bengkel No 45D', 'urutan' => '10'],
            ['nama' => 'alamat', 'tipe' => 'textarea', 'label' => 'Alamat', 'deskripsi' => 'Jl. Raya Citayam <br> RT.010/RW.005, Ratu Jaya <br> Kec. Cipayung, Kota Depok <br> Jawa Barat <br> 16445', 'urutan' => '11'],
            ['nama' => 'facebook', 'tipe' => 'text', 'label' => 'Facebook', 'deskripsi' => 'https://www.facebook.com/lhtkstudio', 'urutan' => '12'],
            ['nama' => 'youtube', 'tipe' => 'text', 'label' => 'Youtube', 'deskripsi' => 'https://www.youtube.com/@lighthinkstudio', 'urutan' => '13'],
            ['nama' => 'instagram', 'tipe' => 'text', 'label' => 'Instagram', 'deskripsi' => 'https://www.instagram.com/lhtkstudio', 'urutan' => '14'],
            ['nama' => 'twitter', 'tipe' => 'text', 'label' => 'Twitter', 'deskripsi' => 'https://twitter.com/', 'urutan' => '15'],
            ['nama' => 'tiktok', 'tipe' => 'text', 'label' => 'Tiktok', 'deskripsi' => 'https://tiktok.com/', 'urutan' => '16'],
            ['nama' => 'favicon', 'tipe' => 'file', 'label' => 'Favicon', 'deskripsi' => 'favicon.ico', 'urutan'    => '17'],
            ['nama' => 'icon', 'tipe' => 'file', 'label' => 'Icon', 'deskripsi' => 'icon.png', 'urutan'   => '18'],
            ['nama' => 'logo', 'tipe' => 'file', 'label' => 'Logo', 'deskripsi' => 'logo.png', 'urutan' => '19'],
            ['nama' => 'horizontal_logo', 'tipe' => 'file', 'label' => 'Logo Horizontal', 'deskripsi' => 'horizontal_logo.png', 'urutan' => '20'],
            ['nama' => 'map', 'tipe' => 'embed', 'label' => 'Google Map', 'deskripsi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.8106021556437!2d106.81291587404591!3d-6.418376762767034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e97e8979de59%3A0xe0736cfc9dfb87!2sLighthink%20Studio!5e0!3m2!1sid!2sid!4v1672801910031!5m2!1sid!2sid" width="100%" height="360" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', 'urutan' => '21'],
            ['nama' => 'versi', 'tipe' => 'text', 'label' => 'Versi App', 'deskripsi' => 'v.1.0.0', 'urutan'    => '22'],
        ];
        // dd($konfigurasi);
        foreach($konfigurasi as $data)
        {
            Konfigurasi::create($data);
        }
    }
}
