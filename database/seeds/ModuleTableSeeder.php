<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modul = [
            ['name'         => 'UI vs UX',
            'category_id'      => '1',
            'picture'       => 'https://www.youthmanual.com/assets/file_uploaded/editor/1544666475-ux-ui.jpg',
            'description'   => 'Android semakin digandrungi. Per Maret 2018 ada lebih dari 3,6 juta aplikasi Android di Google Play Store (Statista). Di indonesia sendiri pada bulan Maret 2019 sebanyak 93,5% konsumen memilih platform Android untuk sistem operasi peranti mobile mereka (Statcounter). Ini menandakan bahwa kebutuhan akan Android developer, semakin meningkat. Tak heran, profesi Android developer merupakan 1 dari 5 profesi yang paling diincar perusahaan (LinkedIn Emerging Jobs Report 2019). 
                            Dicoding sebagai satu-satunya Google Developers Authorized Training Partner di Indonesia telah melalui proses penyusunan kurikulum secara komprehensif. Semua modul telah diverifikasi langsung oleh Google untuk memastikan bahwa materi yang diajarkan relevan dan sesuai dengan kebutuhan industri digital saat ini.n',
            'author'        => 'Author 2',
            'original_price' => 499000,
            'discount_price' => 249000,
            'benefits'       => '- Modul kelas telah dikonsultasikan oleh konsultan bisnis Syariah. - Sertifikat kelulusan kelas.',
            'preview'       => 'https://www.youtube.com/embed/YE4dP24zrwY',
            'precondition'  => 'None' , 
            'target'        => '80 Section mendapatkan nilai rata-rata Baik.', 
            'requirements'  => 'None',
            'references'    => 'https://www.accountingtoday.com/opinion/the-most-useful-microsoft-excel-formulas-for-accountants'],

            ['name'         => 'Design Pattern',
            'category_id'      => '1',
            'picture'       => 'https://d2wakvpiukf49j.cloudfront.net/media/images/designpatterns02.jpg',
            'description'   => 'Android semakin digandrungi. Per Maret 2018 ada lebih dari 3,6 juta aplikasi Android di Google Play Store (Statista). Di indonesia sendiri pada bulan Maret 2019 sebanyak 93,5% konsumen memilih platform Android untuk sistem operasi peranti mobile mereka (Statcounter). Ini menandakan bahwa kebutuhan akan Android developer, semakin meningkat. Tak heran, profesi Android developer merupakan 1 dari 5 profesi yang paling diincar perusahaan (LinkedIn Emerging Jobs Report 2019). 
                            Dicoding sebagai satu-satunya Google Developers Authorized Training Partner di Indonesia telah melalui proses penyusunan kurikulum secara komprehensif. Semua modul telah diverifikasi langsung oleh Google untuk memastikan bahwa materi yang diajarkan relevan dan sesuai dengan kebutuhan industri digital saat ini.n',
            'author'        => 'Author 2',
            'original_price' => 499000,
            'discount_price' => 249000,
            'benefits'       => '- Modul kelas telah dikonsultasikan oleh konsultan bisnis Syariah. - Sertifikat kelulusan kelas.',
            'preview'       => 'https://www.youtube.com/embed/YE4dP24zrwY',
            'precondition'  => 'None' , 
            'target'        => '80 Section mendapatkan nilai rata-rata Baik.', 
            'requirements'  => 'None',
            'references'    => 'https://www.accountingtoday.com/opinion/the-most-useful-microsoft-excel-formulas-for-accountants'],

            ['name'         => 'Management Anti-Pattern',
            'category_id'      => '2',
            'picture'       => 'https://miro.medium.com/max/1838/1*Ur86szqU0bG0fR2T1Q3jWw.png',
            'description'   => 'Android semakin digandrungi. Per Maret 2018 ada lebih dari 3,6 juta aplikasi Android di Google Play Store (Statista). Di indonesia sendiri pada bulan Maret 2019 sebanyak 93,5% konsumen memilih platform Android untuk sistem operasi peranti mobile mereka (Statcounter). Ini menandakan bahwa kebutuhan akan Android developer, semakin meningkat. Tak heran, profesi Android developer merupakan 1 dari 5 profesi yang paling diincar perusahaan (LinkedIn Emerging Jobs Report 2019). 
                            Dicoding sebagai satu-satunya Google Developers Authorized Training Partner di Indonesia telah melalui proses penyusunan kurikulum secara komprehensif. Semua modul telah diverifikasi langsung oleh Google untuk memastikan bahwa materi yang diajarkan relevan dan sesuai dengan kebutuhan industri digital saat ini.n',
            'author'        => 'Author 3',
            'original_price' => 499000,
            'discount_price' => 249000,
            'benefits'       => '- Modul kelas telah dikonsultasikan oleh konsultan bisnis Syariah. - Sertifikat kelulusan kelas.',
            'preview'       => 'https://www.youtube.com/embed/YE4dP24zrwY',
            'precondition'  => 'None' , 
            'target'        => '80 Section mendapatkan nilai rata-rata Baik.', 
            'requirements'  => 'None',
            'references'    => 'https://www.accountingtoday.com/opinion/the-most-useful-microsoft-excel-formulas-for-accountants'],
        ];

        DB::table('modules')->insert($modul);
    }
}
