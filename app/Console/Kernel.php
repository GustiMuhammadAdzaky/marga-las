<?php

namespace App\Console;

use App\Http\Controllers\Admin\TransaksiAdminController;
use App\Mail\ReminderEmail;
use App\Models\TransaksiModel;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->call(function () {
        //     $transaksiBelumTerbayarTransfer = TransaksiModel::where('status', 'belum_terbayar')
        //         ->where('tipe_pembayaran', 'transfer')
        //         ->get();
        //     foreach ($transaksiBelumTerbayarTransfer as $transaksi) {
        //         $transaksi->delete();
        //     }
        // })->everyFourHours(); // -> Jalankan tugas pada hari pertama setiap bulan pukul 00:00
        // $schedule->call(function () {
        //     $transaksiBelumTerbayarKredit = TransaksiModel::where('status', 'belum_terbayar')
        //         ->where('tipe_pembayaran', 'kredit')
        //         ->get();

        //     foreach ($transaksiBelumTerbayarKredit as $transaksi) {
        //         $this->sendReminderEmail($transaksi, $transaksi->user->email);
        //     }

        //     info('Email Telah terkirim');
        // })->monthly(); // -> Jalankan tugas setiap empat jam


        // demo permenit
        $schedule->call(function () {
            // $transaksiBelumTerbayarTransfer = TransaksiModel::where('status', 'belum_terbayar')
            //     ->where('tipe_pembayaran', 'transfer')
            //     ->get();
            // foreach ($transaksiBelumTerbayarTransfer as $transaksi) {
            //     $transaksi->delete();
            // }

            info('tst');
        })->everyMinute(); // -> Jalankan tugas pada hari pertama setiap bulan pukul 00:00
        // $schedule->call(function () {
        //     $transaksiBelumTerbayarKredit = TransaksiModel::where('status', 'belum_terbayar')
        //         ->where('tipe_pembayaran', 'kredit')
        //         ->get();

        //     foreach ($transaksiBelumTerbayarKredit as $transaksi) {
        //         $this->sendReminderEmail($transaksi, $transaksi->user->email);
        //     }

        //     info('Email Telah terkirim');
        // })->everyMinute(); // -> Jalankan tugas setiap empat jam
    }

    protected function sendReminderEmail($transaksi, $email)
    {
        Mail::to($email)->send(new ReminderEmail($transaksi));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
