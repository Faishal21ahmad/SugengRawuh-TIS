<?php

namespace Database\Seeders;


use App\Models\MejaRM;
use App\Models\MenuRM;
use App\Models\Adminrm;
use App\Models\Pesanan;
use App\Models\Kategori;
use App\Models\Pembayaran;
use Illuminate\Support\Str;
use App\Models\DetailPesanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        Adminrm::create([
            'namarm' => 'Rawuh Warmindo',
            'owner' => 'Faishal',
            'email' => 'rawuh@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345'),
            'remember_token' => Str::random(10)
        ]);

        Adminrm::create([
            'namarm' => 'Rawuh Mewah',
            'owner' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345'),
            'remember_token' => Str::random(10)
        ]);

        Adminrm::create([
            'namarm' => 'Burjo Mewah',
            'owner' => 'Pak burjo',
            'email' => 'burjo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345'),
            'remember_token' => Str::random(10)
        ]);

        for ($i = 1; $i < 10; $i++) {
            MejaRM::create([
                'adminrm_id' => 1,
                'no' => $i,
                'pesan' => 'Scan Untuk Memesan',
                'link' => 'http://127.0.0.1:8000/pesan/' . $i . '/1',
                'qr' => 'qr-code.png',
            ]);
        }

        for ($i = 1; $i < 10; $i++) {
            MejaRM::create([
                'adminrm_id' => 2,
                'no' => $i,
                'pesan' => 'Scan Untuk Memesan',
                'link' => 'http://127.0.0.1:8000/pesan/' . $i . '/2',
                'qr' => 'qr-code.png',
            ]);
        }

        for ($i = 1; $i < 10; $i++) {
            MejaRM::create([
                'adminrm_id' => 3,
                'no' => $i,
                'pesan' => 'Scan Untuk Memesan',
                'link' => 'http://127.0.0.1:8000/pesan/' . $i . '/3',
                'qr' => 'qr-code.png',
            ]);
        }

        // RM 1
        MenuRM::create([
            'adminrm_id' => 1,
            'kategori_id' => 1,
            'menu' => 'Mie Ayam Bakso',
            'desmenu' => 'Mie ayam Bakso, Dengan rasa yang kuat dan pas',
            'harga' => 18000,
            'img' => 'menu-img/mie ayam bakso.png',
            'status' => 'tersedia',
        ]);

        MenuRM::create([
            'adminrm_id' => 1,
            'kategori_id' => 1,
            'menu' => 'Mie Ayam',
            'desmenu' => 'Mie ayam, Dengan rasa yang kuat dan pas, terenak sejagat Wonogiri',
            'harga' => 10000,
            'img' => 'menu-img/mie ayam1.jpg',
            'status' => 'tersedia',
        ]);
        MenuRM::create([
            'adminrm_id' => 1,
            'kategori_id' => 1,
            'menu' => 'Bakso',
            'desmenu' => 'Bakso, Dengan rasa yang kuat dan pas, terenak sejagat Wonogiri',
            'harga' => 15000,
            'img' => 'menu-img/bakso.jpeg',
            'status' => 'taktersedia',
        ]);
        MenuRM::create([
            'adminrm_id' => 1,
            'kategori_id' => 2,
            'menu' => 'Teh Kuli',
            'desmenu' => 'Teh pilihanx dengan porsi kuli',
            'harga' => 4000,
            'img' => 'menu-img/teh kuli.jpg',
            'status' => 'taktersedia',
        ]);

        // RM 2
        MenuRM::create([
            'adminrm_id' => 2,
            'kategori_id' => 4,
            'menu' => 'Sate',
            'desmenu' => 'Sate dengan daging pilihan dan posrsi pas',
            'harga' => 18000,
            'img' => 'menu-img/sate.jpg',
            'status' => 'tersedia',
        ]);

        MenuRM::create([
            'adminrm_id' => 2,
            'kategori_id' => 4,
            'menu' => 'Soto Ayam',
            'desmenu' => 'Soto ter lezzat',
            'harga' => 10000,
            'img' => 'menu-img/sotoayam.jpg',
            'status' => 'tersedia',
        ]);
        MenuRM::create([
            'adminrm_id' => 2,
            'kategori_id' => 4,
            'menu' => 'Sop Iga',
            'desmenu' => 'Sop Iga dengan gaging tulang yang pas',
            'harga' => 15000,
            'img' => 'menu-img/sop iga.jpg',
            'status' => 'taktersedia',
        ]);
        MenuRM::create([
            'adminrm_id' => 2,
            'kategori_id' => 5,
            'menu' => 'Wedang Jahe',
            'desmenu' => 'Wedang Jahe dengan jahe dataran tinggi terbaik',
            'harga' => 4000,
            'img' => 'menu-img/wedang jahe.jpg',
            'status' => 'taktersedia',
        ]);
        // RM 3
        MenuRM::create([
            'adminrm_id' => 3,
            'kategori_id' => 7,
            'menu' => 'Nasi Goreng Spesial',
            'desmenu' => 'Nasi Goreng Spesial Paling enak',
            'harga' => 12000,
            'img' => 'menu-img/nasi goreng spesial.jpg',
            'status' => 'tersedia',
        ]);

        MenuRM::create([
            'adminrm_id' => 3,
            'kategori_id' => 7,
            'menu' => 'Nasi Uduj',
            'desmenu' => 'Nasi Uduk dengan lauk lengkap',
            'harga' => 10000,
            'img' => 'menu-img/nasi uduk.jpg',
            'status' => 'tersedia',
        ]);
        MenuRM::create([
            'adminrm_id' => 3,
            'kategori_id' => 7,
            'menu' => 'Nasi Liwet',
            'desmenu' => 'Nasi Liwet enak jos gandos',
            'harga' => 13000,
            'img' => 'menu-img/nasi liwet.jpg',
            'status' => 'taktersedia',
        ]);
        MenuRM::create([
            'adminrm_id' => 3,
            'kategori_id' => 8,
            'menu' => 'Susu',
            'desmenu' => 'Susu Segar',
            'harga' => 5000,
            'img' => 'menu-img/susu.png',
            'status' => 'taktersedia',
        ]);

        for ($i = 1; $i < 4; $i++) {
            Kategori::create([
                'adminrm_id' => $i,
                'namakategori' => 'Makanan',
            ]);
            Kategori::create([
                'adminrm_id' => $i,
                'namakategori' => 'Minuman',
            ]);
            Kategori::create([
                'adminrm_id' => $i,
                'namakategori' => 'Lalapan',
            ]);
        }
        //PSN 1
        Pesanan::create([

            'adminrm_id' => 1,
            'meja_id' => 2,
            'jenispembayaran_id' => 1,
            'codepesan' => 'qwe123',
            'namapemesan' => 'Joko',
            'totalharga' => 22000,
            'statuspesanan' => 'diterima',
        ]);

        DetailPesanan::create([
            'pesanan_id' => 1,
            'menu_id' => 1,
            'codepesan' => 'qwe123',
            'jumlah' => 1,
            'subharga' => 18000
        ]);

        DetailPesanan::create([
            'pesanan_id' => 1,
            'menu_id' => 4,
            'codepesan' => 'qwe123',
            'jumlah' => 1,
            'subharga' => 4000
        ]);
        //PSN 2
        Pesanan::create([
            'adminrm_id' => 2,
            'meja_id' => 10,
            'jenispembayaran_id' => 1,
            'codepesan' => '321ewq',
            'namapemesan' => 'Milla',
            'totalharga' => 19000,
            'statuspesanan' => 'diterima',
        ]);

        DetailPesanan::create([
            'pesanan_id' => 2,
            'menu_id' => 7,
            'codepesan' => '321ewq',
            'jumlah' => 1,
            'subharga' => 15000
        ]);

        DetailPesanan::create([
            'pesanan_id' => 2,
            'menu_id' => 8,
            'codepesan' => '321ewq',
            'jumlah' => 1,
            'subharga' => 4000
        ]);



        //PSN 3
        Pesanan::create([
            'adminrm_id' => 2,
            'meja_id' => 11,
            'jenispembayaran_id' => 1,
            'codepesan' => '4324',
            'namapemesan' => 'Nisa',
            'totalharga' => 47000,
            'statuspesanan' => 'diterima',
        ]);

        DetailPesanan::create([
            'pesanan_id' => 3,
            'menu_id' => 5,
            'codepesan' => '4324',
            'jumlah' => 1,
            'subharga' => 18000
        ]);

        DetailPesanan::create([
            'pesanan_id' => 3,
            'menu_id' => 6,
            'codepesan' => '4324',
            'jumlah' => 1,
            'subharga' => 10000
        ]);
        DetailPesanan::create([
            'pesanan_id' => 3,
            'menu_id' => 7,
            'codepesan' => '4324',
            'jumlah' => 1,
            'subharga' => 15000
        ]);

        DetailPesanan::create([
            'pesanan_id' => 3,
            'menu_id' => 8,
            'codepesan' => '4324',
            'jumlah' => 1,
            'subharga' => 4000
        ]);

        //PSN 4
        Pesanan::create([
            'adminrm_id' => 2,
            'meja_id' => 12,
            'jenispembayaran_id' => 1,
            'codepesan' => '432ter',
            'namapemesan' => 'Fikri',
            'totalharga' => 19000,
            'statuspesanan' => 'diterima',
        ]);

        DetailPesanan::create([
            'pesanan_id' => 4,
            'menu_id' => 7,
            'codepesan' => '432ter',
            'jumlah' => 1,
            'subharga' => 15000
        ]);

        DetailPesanan::create([
            'pesanan_id' => 4,
            'menu_id' => 8,
            'codepesan' => '432ter',
            'jumlah' => 1,
            'subharga' => 4000
        ]);

        //PSN 5
        Pesanan::create([
            'adminrm_id' => 2,
            'meja_id' => 13,
            'jenispembayaran_id' => 1,
            'codepesan' => 'qwewer',
            'namapemesan' => 'Fathuni',
            'totalharga' => 19000,
            'statuspesanan' => 'diterima',
        ]);

        DetailPesanan::create([
            'pesanan_id' => 5,
            'menu_id' => 7,
            'codepesan' => 'qwewer',
            'jumlah' => 1,
            'subharga' => 15000
        ]);

        DetailPesanan::create([
            'pesanan_id' => 5,
            'menu_id' => 8,
            'codepesan' => 'qwewer',
            'jumlah' => 1,
            'subharga' => 4000
        ]);

        //PSN 5
        Pesanan::create([
            'adminrm_id' => 2,
            'meja_id' => 14,
            'jenispembayaran_id' => 1,
            'codepesan' => 'dfgdfg',
            'namapemesan' => 'Jokos',
            'totalharga' => 47000,
            'statuspesanan' => 'diterima',
        ]);

        DetailPesanan::create([
            'pesanan_id' => 6,
            'menu_id' => 5,
            'codepesan' => 'dfgdfg',
            'jumlah' => 1,
            'subharga' => 18000
        ]);

        DetailPesanan::create([
            'pesanan_id' => 6,
            'menu_id' => 6,
            'codepesan' => 'dfgdfg',
            'jumlah' => 1,
            'subharga' => 10000
        ]);
        DetailPesanan::create([
            'pesanan_id' => 6,
            'menu_id' => 7,
            'codepesan' => 'dfgdfg',
            'jumlah' => 1,
            'subharga' => 15000
        ]);

        DetailPesanan::create([
            'pesanan_id' => 6,
            'menu_id' => 8,
            'codepesan' => 'dfgdfg',
            'jumlah' => 1,
            'subharga' => 4000
        ]);


        for ($i = 1; $i < 4; $i++) {
            Pembayaran::create([
                'adminrm_id' => $i,
                'namapembayaran' => 'cash',
                'qrpembayaran' => '',
            ]);

            Pembayaran::create([
                'adminrm_id' => $i,
                'namapembayaran' => 'Qris',
                'qrpembayaran' => 'pay-img/qrShopee.jpg',
            ]);
        }
    }
}
