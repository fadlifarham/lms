<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing(){ 
        
        //===================================== ISI KONTEN DI SINI ================================================================//
        
        //--- BERANDA UTAMA ---//
        $title              = "LMS";
        $title_beranda      = "Selamat Datang";
        // $short_desc_beranda = "LMS merupakan subsidiary dari Maulidan Games dimana anda akan mendapatkan akses pada materi-materi
        //                         training dan workshop yang berkisar tentang programming hingga manajemen proyek IT. 
        //                         Semua materi disampaikan dengan pendekatan akademis dan dibuktikan secara best practice 
        //                         oleh para praktisi yang berpengalaman bertahun-tahun dalam industri games dan apps";
        $short_desc_beranda = "LMS adalah program perangkat lunak berbasis web untuk manajemen, dokumentasi, pemantauan, pelaporan, administrasi dan distribusi konten pendidikan, program pelatihan, manual teknis, video instruksional atau bahan perpustakaan digital, dan proyek pembelajaran dan pengembangan.";
        
        //--- KEUNGGULAN ---//
        $title_keunggulan   = "Keunggulan Kami";
        $keunggulan1        = "Konten Komprehensif";
        $keunggulan1_desc   = "Tersedia berbagai macam modul, training, dan workshop dalam lingkup programming 
                                dan manajemen proyek IT. ";
        $keunggulan2        = "Asistensi Jangka Panjang";
        $keunggulan2_desc   = "Peserta akan mendapatkan asistensi selama 1 tahun untuk memahami materi melalui media chat langsung dengan trainer.";
        $keunggulan3        = "Metode Ilmiah dan Terstruktur";
        $keunggulan3_desc   = "Materi disampaikan dengan dasar teori dari referensi-referensi ilmiah yang divalidasi oleh para praktisi melalui berbagai kasus dalam proyek-proyek nyata di dunia industri.";
        $gambar_keunggulan_1= "img/keunggulan1.jpg";
        $gambar_keunggulan_2= "img/keunggulan2.jpg";
        $gambar_keunggulan_3= "img/keunggulan3.jpg";
        
        //--- FASILITAS DAN LAYANAN ---//
        $title_layanan      = "Fasilitas dan Layanan";
        $short_desc_layanan = "Berbagai fasilitas yang akan diterima para peserta training adalah sebagai berikut:";
        $layanan1           = "Workshop dan Training";
        $layanan1_desc      = "Materi disampaikan dalam format praktik dan teori dengan studi kasus yang ada pada dunia industri.";
        $layanan2           = "Modul dan Cheatsheet";
        $layanan2_desc      = "Disediakan modul, workbook, buku rangkuman, serta eksplisit simplifikasi agar materi mudah dipahami secara makro.";
        $layanan3           = "Sertifikasi";
        $layanan3_desc      = "Penilaian dan evaluasi kompetensi profesional dengan standar industri.";
        $layanan4           = "Pengayaan Higher-Order-Thinking";
        $layanan4_desc      = "Pengayaan kompetensi profesional dalam skala analisa sesuai dengan standar expert.";
        $layanan5           = "Asistensi Penyusunan Kurikulum";
        $layanan5_desc      = "Asistensi penyusunan silabus dan kurikulum perkuliahan yang berstandar pada kebutuhan industri.";
        $layanan6           = "Konsultasi Satu Tahun";
        $layanan6_desc      = "Konsultasi pasca training/workshop dapat dilakukan melalui chat agar mudah dan cepat.";
        
        //--- GALERI ---//
        $title_galeri       = "Galeri";
        $title_galeri_1     = "";
        $title_galeri_2     = "";
        $title_galeri_3     = "";
        $title_galeri_4     = "";
        $title_galeri_5     = "";
        $title_galeri_6     = "";
        $title_galeri_7     = "";
        $title_galeri_8     = "";
        $title_galeri_9     = "";
        $galeri1            = "img/intro-carousel/3.jpg";
        $galeri2            = "img/intro-carousel/4.jpg";
        $galeri3            = "img/intro-carousel/5.jpg";
        $galeri4            = "img/galeri/galeri4.jpg";
        $galeri5            = "img/galeri/galeri5.jpg";
        $galeri6            = "img/galeri/galeri6.JPG";
        $galeri7            = "img/galeri/galeri7.JPG";
        $galeri8            = "img/galeri/galeri8.jpg";
        $galeri9            = "img/galeri/galeri9.jpeg";
        $galeri1_desc       = "";
        $galeri2_desc       = "";
        $galeri3_desc       = "";
        $galeri4_desc       = "";
        $galeri5_desc       = "";
        $galeri6_desc       = "";
        $galeri7_desc       = "";
        $galeri8_desc       = "";
        $galeri9_desc       = "";
        
        //--- PARTNER ---//
        $title_partner      = "Partner Kami";
        $partner1           = "img/partner/amazon.png";
        $partner2           = "img/partner/apple.png";
        $partner3           = "img/partner/google.png";
        $partner4           = "img/partner/metaverse.png";
        $partnerits         = "img/partner/microsoft.png";
        $partner5           = "img/partner/partner5.jpg";
        $partner6           = "img/partner/partner6.jpg";
        $partner7           = "img/partner/partner7.jpg";
        
        
        //--- KONTAK ---//
        $title_kontak       = "Kontak Kami";
        $kontak_desc        = "Hubungi kami melalui WhatsApp dan Email untuk respon yang cepat.";
        $link_whatsapp      = "https://wasap.at/4j8AoT";
        $whatsapp           = "+6289664857645";
        $email              = "info@lms.com";
        
        //--- FOOTER ---//
        $tagline            = "“Membawa materi keilmuan IT yang berstandar industri.”";
        $footer_desc        = "Membangun kemampuan programming untuk skala expert serta manajemen proyek untuk memaksimalkan produktivitas dengan metode yang sistematis dan ilmiah.";
        
        //======================================== BATAS ISI KONTEN ==================================================//

        return view('landing-page/landing', [
            'title'                 => $title,
            'title_beranda'         => $title_beranda,
            'short_desc_beranda'    => $short_desc_beranda,
            'title_keunggulan'      => $title_keunggulan,
            'keunggulan1'           => $keunggulan1,
            'keunggulan1_desc'      => $keunggulan1_desc,
            'keunggulan2'           => $keunggulan2,
            'keunggulan2_desc'      => $keunggulan2_desc,
            'keunggulan3'           => $keunggulan3,
            'keunggulan3_desc'      => $keunggulan3_desc,
            'gambar_keunggulan_1'   => $gambar_keunggulan_1,
            'gambar_keunggulan_2'   => $gambar_keunggulan_2,
            'gambar_keunggulan_3'   => $gambar_keunggulan_3,
            'title_layanan'         => $title_layanan,
            'short_desc_layanan'    => $short_desc_layanan,
            'layanan1'              => $layanan1,
            'layanan1_desc'         => $layanan1_desc,
            'layanan2'              => $layanan2,
            'layanan2_desc'         => $layanan2_desc,
            'layanan3'              => $layanan3,
            'layanan3_desc'         => $layanan3_desc,
            'layanan4'              => $layanan4,
            'layanan4_desc'         => $layanan4_desc,
            'layanan5'              => $layanan5,
            'layanan5_desc'         => $layanan5_desc,
            'layanan6'              => $layanan6,
            'layanan6_desc'         => $layanan6_desc,
            'title_galeri'          => $title_galeri,
            'galeri1'               => $galeri1,
            'galeri2'               => $galeri2,
            'galeri3'               => $galeri3,
            'galeri4'               => $galeri4,
            'galeri5'               => $galeri5,
            'galeri6'               => $galeri6,
            'galeri7'               => $galeri7,
            'galeri8'               => $galeri8,
            'galeri9'               => $galeri9,
            'title_galeri_1'        => $title_galeri_1,
            'title_galeri_2'        => $title_galeri_2,
            'title_galeri_3'        => $title_galeri_3,
            'title_galeri_4'        => $title_galeri_4,
            'title_galeri_5'        => $title_galeri_5,
            'title_galeri_6'        => $title_galeri_6,
            'title_galeri_7'        => $title_galeri_7,
            'title_galeri_8'        => $title_galeri_8,
            'title_galeri_9'        => $title_galeri_9,
            'galeri1_desc'          => $galeri1_desc,
            'galeri2_desc'          => $galeri2_desc,
            'galeri3_desc'          => $galeri3_desc,
            'galeri4_desc'          => $galeri4_desc,
            'galeri5_desc'          => $galeri5_desc,
            'galeri6_desc'          => $galeri6_desc,
            'galeri7_desc'          => $galeri7_desc,
            'galeri8_desc'          => $galeri8_desc,
            'galeri9_desc'          => $galeri9_desc,
            'title_partner'         => $title_partner,
            'partner1'              => $partner1,
            'partner2'              => $partner2,
            'partner3'              => $partner3,
            'partner4'              => $partner4,
            'partnerits'            => $partnerits,
            'partner5'              => $partner5,
            'partner6'              => $partner6,
            'partner7'              => $partner7,
            'title_kontak'          => $title_kontak,
            'kontak_desc'           => $kontak_desc,
            'link_whatsapp'         => $link_whatsapp,
            'whatsapp'              => $whatsapp,
            'email'                 => $email,
            'tagline'               => $tagline,
            'footer_desc'           => $footer_desc,
        ]);
    }

    public function error(){
        return view('user-pages.error');
    }
}
