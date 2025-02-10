<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();

        Setting::create([
            'academy_year_id' => null,
            'stage_id' => null,
            'question_iq_value' => 50,
            'question_personal_value' => 50,
            'announcement' => '2022/09/01',
            'no_msg' => null,
            'notification' => null,
            'notif_tahap1' => '
Anda di nyatakan *Lolos* _Tes Tahap Pertama_ dan bisa lanjut Ke _Tes Tahap Kedua_
Ketika mengerjakan tes tahap kedua, mohon perhatikan koneksi internet, tidak membuka web lain seperti chatgpt atau AI sejenisnya dan di kerjakan pada waktu yang benar-benar bisa mengerjakan dengan baik agar tidak terjadi error.

Berikut tutorialnya : https://www.youtube.com/watch?v=a3qLWpZZ73o

Tes Tahap 2 :
',

            'notif_tahap1_sm' => '
Anda dinyatakan *Lolos* Ketahap berikutnya.

Untuk melakukan tes _Tahap Wawancara_, anda akan kami hubungi untuk melakukan tes Wawancara.',

            'notif_tahap1_failed' => '
Anda di nyatakan *Tidak Lolos* _Tes Tahap Pertama_ dan tidak bisa lanjut Ke _Tahap Selanjutnya_

Tetap Semangka (Semangat Karena Allah !)',

            'notif_tahap2' => '
Anda dinyatakan *Lolos* _Tes Tahap Kedua_ dan bisa lanjut ke _Tahap Ketiga_',

            'notif_tahap2_failed' => '
Anda dinyatakan *Tidak Lolos* _Tes Tahap Kedua_ dan tidak bisa lanjut ke _Tahap Ketiga_

Tetap Semangka (Semangat Karena Allah !)',

            'notif_tahap3' => '
Anda dinyatakan *Lolos* _Tes Tahap Ketiga_ dan bisa lanjut ke _Tahap Keempat_',

            'notif_tahap3_failed' => '
Anda dinyatakan *Tidak Lolos* _Tes Tahap Ketiga dan tidak bisa lanjut ke _Tahap Keempat_

Tetap Semangka (Semangat Karena Allah !)',

            'notif_tahap4' => '
Anda dinyatakan *Lolos* _Tes Tahap Keempat_ dan bisa lanjut ke _Tahap Kelima_

Untuk tes _Tahap Kelima_ adalah *wawancara*, Kami akan segera memberitahu anda mengenai waktunya

*Pastikan selalu mengecek whatsapp agar tidak melewatkan jadwal yang kami berikan*',

            'notif_tahap4_failed' => '
Anda dinyatakan *Tidak Lolos* _Tes Tahap Keempat_ dan tidak bisa lanjut ke _Tahap Kelima_

Tetap Semangka (Semangat Karena Allah !)',

            'notif_tahap5' => null,

            'notif_tahap5_passed' => '
Anda dinyatakan *Lolos* Sebagai calon *santri Pondok Mahir Teknologi*

Untuk informasi selanjutnya akan kami kirim melalui WhatsApp, *Pastikan whatsapp selalu aktif*',

            'notif_tahap5_failed' => '
Anda dinyatakan *Tidak Lolos* pada sesi *Wawancara*

Tetap Semangka (Semangat Karena Allah !)',

            'complete_tahap1' =>'
Anda telah selesai melaksanakan tes _Tahap Pertama_.

Informasi hasil tes akan kami umumkan melalui web dan nomor whatsapp ini, *Pastikan whatsapp selalu aktif*.

Anda baru bisa lanjut mengikuti tes _Tahap Kedua_ jika dinyatakan lolos di tes _Tahap Pertama_',

            'complete_tahap1_sm' => '
Anda telah selesai melaksanakan tes _Biodata_.

Informasi hasil tes akan kami umumkan melalui web dan nomor whatsapp ini, *Pastikan whatsapp selalu aktif*.

Anda bisa lanjut mengikuti tes Wawancara jika dinyatakan lolos di tes Biodata.',

            'complete_tahap2' => '
Anda telah selesai melaksanakan tes _Tahap Kedua_.

Informasi hasil tes akan kami umumkan melalui web dan nomor whatsapp ini, *Pastikan whatsapp selalu aktif*.

Anda baru bisa lanjut mengikuti tes _Tahap Ketiga_ jika dinyatakan lolos di tes _Tahap Kedua_',

            'complete_tahap3' => '
Anda telah selesai melaksanakan tes _Tahap Ketiga_.

Informasi hasil tes akan kami umumkan melalui web dan nomor whatsapp ini, *Pastikan whatsapp selalu aktif*.

Anda baru bisa lanjut mengikuti tes _Tahap Keempat_ jika dinyatakan lolos di tes _Tahap Ketiga_',

            'complete_tahap4' => '
Anda telah selesai melaksanakan tes _Tahap Keempat_.

Informasi hasil tes akan kami umumkan melalui web dan nomor whatsapp ini, *Pastikan whatsapp selalu aktif*.

Anda baru bisa lanjut mengikuti tes _Tahap Kelima_ jika dinyatakan lolos di tes _Tahap Keempat_',
        ]);
    }
}