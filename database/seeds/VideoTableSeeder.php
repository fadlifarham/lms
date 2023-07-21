<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = [
            ['section_id' => 1, 'title' => "Overview Excel untuk Keuangan", 'description' => "Video ini dibuat untuk pelajar atau pemula yang ingin belajar memahami lebih lanjut mengenai pengolahan angka dengan microsoft excel.Cara Membuat Laporan Keuangan Sederhana dengan microsoft excel 2016 sangat mudah kawan. Ini lebih ke arah cash flow atau aliran kas saja ya. Transaksi kas di tangan gitu deh. Untuk buku besar, neraca saldo, jurnal umum mungkin itu pembahasan yang lebih lanjut lagi. ditunggu saja video tutorial excel berikutnya ya. Waw, ini dia yang lagi banyak dicari-cari orang ya, membuat laporan kas di tangan atau cash flow memang susah-sudah gampang.", 'link' => "https://docs.google.com/presentation/d/e/2PACX-1vSHMP0AvPaRHcBPz-ETcBzpvpGoUx-MMlMEF-pDy56xnwokVpn0bmKropJXbowrK50LvGm6wsHpPEhZkKNEJ6U/embed?start=false&loop=false&delayms=3000", 'type' => 0],
            ['section_id' => 1, 'title' => "Excel Crash Course for Finance Professionals", 'description' => "Enroll in the FREE full course to earn your certification and advance your career: http://courses.corporatefinanceinstit... The ultimate Excel crash course for finance professionals. Learn all the Excel tips, tricks, shortcuts, formulas and functions you need for financial modeling in this free online course. Key concepts include: formatting, ribbon shortcuts, if statements, eomonth, year, paste special, fill right, fill down, auto sum, sumproduct, iferror, today(), concatenate, special numbers, vlookup, index, match, xirr, xnpv, yearfrac, and much more.", 'link' => "https://docs.google.com/presentation/d/e/2PACX-1vSHMP0AvPaRHcBPz-ETcBzpvpGoUx-MMlMEF-pDy56xnwokVpn0bmKropJXbowrK50LvGm6wsHpPEhZkKNEJ6U/embed?start=false&loop=false&delayms=3000", 'type' => 1],
            ['section_id' => 1, 'title' => "Introduction to Pivot Tables, Charts, and Dashboards in Excel (Part 1)", 'description' => "Excel has a lot of formulas and functionalities that can help you clean your data. For example, you can use a formula such as TRIM to clean your data of leading, trailing and double spaces. Or you can use the remove duplicate functionality to remove any occurrence of duplicate records.", 'link' => "https://www.youtube.com/embed/9NUjHBNWe9M", 'type' => 1],
            ['section_id' => 1, 'title' => "10 Super Neat Ways to Clean Data in Excel", 'description' => "Data forms the backbone of any analysis that you do in Excel. And when it comes to data, there are tons of things that can go wrong – be it the structure, placement, formatting, extra spaces, and so on. Excel can be an amazing tool for data analysis. But we hardly get the data that can be used right away. And bad data leads to bad analysis.", 'link' => "https://www.youtube.com/embed/e0TfIbZXPeA", 'type' => 1],
            
            ['section_id' => 2, 'title' => "Overview Excel untuk Keuangan", 'description' => "Video ini dibuat untuk pelajar atau pemula yang ingin belajar memahami lebih lanjut mengenai pengolahan angka dengan microsoft excel.Cara Membuat Laporan Keuangan Sederhana dengan microsoft excel 2016 sangat mudah kawan. Ini lebih ke arah cash flow atau aliran kas saja ya. Transaksi kas di tangan gitu deh. Untuk buku besar, neraca saldo, jurnal umum mungkin itu pembahasan yang lebih lanjut lagi. ditunggu saja video tutorial excel berikutnya ya. Waw, ini dia yang lagi banyak dicari-cari orang ya, membuat laporan kas di tangan atau cash flow memang susah-sudah gampang.", 'link' => "https://docs.google.com/presentation/d/e/2PACX-1vSHMP0AvPaRHcBPz-ETcBzpvpGoUx-MMlMEF-pDy56xnwokVpn0bmKropJXbowrK50LvGm6wsHpPEhZkKNEJ6U/embed?start=false&loop=false&delayms=3000", 'type' => 0],
            ['section_id' => 2, 'title' => "Excel Crash Course for Finance Professionals", 'description' => "Enroll in the FREE full course to earn your certification and advance your career: http://courses.corporatefinanceinstit... The ultimate Excel crash course for finance professionals. Learn all the Excel tips, tricks, shortcuts, formulas and functions you need for financial modeling in this free online course. Key concepts include: formatting, ribbon shortcuts, if statements, eomonth, year, paste special, fill right, fill down, auto sum, sumproduct, iferror, today(), concatenate, special numbers, vlookup, index, match, xirr, xnpv, yearfrac, and much more.", 'link' => "https://docs.google.com/presentation/d/e/2PACX-1vSHMP0AvPaRHcBPz-ETcBzpvpGoUx-MMlMEF-pDy56xnwokVpn0bmKropJXbowrK50LvGm6wsHpPEhZkKNEJ6U/embed?start=false&loop=false&delayms=3000", 'type' => 1],
            ['section_id' => 2, 'title' => "Introduction to Pivot Tables, Charts, and Dashboards in Excel (Part 1)", 'description' => "Excel has a lot of formulas and functionalities that can help you clean your data. For example, you can use a formula such as TRIM to clean your data of leading, trailing and double spaces. Or you can use the remove duplicate functionality to remove any occurrence of duplicate records.", 'link' => "https://www.youtube.com/embed/9NUjHBNWe9M", 'type' => 1],
            ['section_id' => 2, 'title' => "10 Super Neat Ways to Clean Data in Excel", 'description' => "Data forms the backbone of any analysis that you do in Excel. And when it comes to data, there are tons of things that can go wrong – be it the structure, placement, formatting, extra spaces, and so on. Excel can be an amazing tool for data analysis. But we hardly get the data that can be used right away. And bad data leads to bad analysis.", 'link' => "https://www.youtube.com/embed/e0TfIbZXPeA", 'type' => 1],

            ['section_id' => 3, 'title' => "Overview Excel untuk Keuangan", 'description' => "Video ini dibuat untuk pelajar atau pemula yang ingin belajar memahami lebih lanjut mengenai pengolahan angka dengan microsoft excel.Cara Membuat Laporan Keuangan Sederhana dengan microsoft excel 2016 sangat mudah kawan. Ini lebih ke arah cash flow atau aliran kas saja ya. Transaksi kas di tangan gitu deh. Untuk buku besar, neraca saldo, jurnal umum mungkin itu pembahasan yang lebih lanjut lagi. ditunggu saja video tutorial excel berikutnya ya. Waw, ini dia yang lagi banyak dicari-cari orang ya, membuat laporan kas di tangan atau cash flow memang susah-sudah gampang.", 'link' => "https://docs.google.com/presentation/d/e/2PACX-1vSHMP0AvPaRHcBPz-ETcBzpvpGoUx-MMlMEF-pDy56xnwokVpn0bmKropJXbowrK50LvGm6wsHpPEhZkKNEJ6U/embed?start=false&loop=false&delayms=3000", 'type' => 0],
            ['section_id' => 3, 'title' => "Excel Crash Course for Finance Professionals", 'description' => "Enroll in the FREE full course to earn your certification and advance your career: http://courses.corporatefinanceinstit... The ultimate Excel crash course for finance professionals. Learn all the Excel tips, tricks, shortcuts, formulas and functions you need for financial modeling in this free online course. Key concepts include: formatting, ribbon shortcuts, if statements, eomonth, year, paste special, fill right, fill down, auto sum, sumproduct, iferror, today(), concatenate, special numbers, vlookup, index, match, xirr, xnpv, yearfrac, and much more.", 'link' => "https://docs.google.com/presentation/d/e/2PACX-1vSHMP0AvPaRHcBPz-ETcBzpvpGoUx-MMlMEF-pDy56xnwokVpn0bmKropJXbowrK50LvGm6wsHpPEhZkKNEJ6U/embed?start=false&loop=false&delayms=3000", 'type' => 1],
            ['section_id' => 3, 'title' => "Introduction to Pivot Tables, Charts, and Dashboards in Excel (Part 1)", 'description' => "Excel has a lot of formulas and functionalities that can help you clean your data. For example, you can use a formula such as TRIM to clean your data of leading, trailing and double spaces. Or you can use the remove duplicate functionality to remove any occurrence of duplicate records.", 'link' => "https://www.youtube.com/embed/9NUjHBNWe9M", 'type' => 1],
            ['section_id' => 3, 'title' => "10 Super Neat Ways to Clean Data in Excel", 'description' => "Data forms the backbone of any analysis that you do in Excel. And when it comes to data, there are tons of things that can go wrong – be it the structure, placement, formatting, extra spaces, and so on. Excel can be an amazing tool for data analysis. But we hardly get the data that can be used right away. And bad data leads to bad analysis.", 'link' => "https://www.youtube.com/embed/e0TfIbZXPeA", 'type' => 1],
        ];

        DB::table('videos')->insert($videos);
    }
}
