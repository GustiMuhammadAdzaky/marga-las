<?php

namespace App\Console;

use App\Http\Controllers\Admin\TransaksiAdminController;
use App\Models\TransaksiModel;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // protected function schedule(Schedule $schedule)
    // {
    //     // $schedule->command('inspire')->hourly();
    // }

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Query untuk mendapatkan transaksi yang belum dibayar dan memerlukan pengingat
            $transaksis = TransaksiModel::where('status', 'belum_terbayar')
                ->whereNotNull('reminder')
                ->where('reminder', '<=', now()->subMinutes(1)) // Mengecek transaksi yang belum dibayar selama 1 menit
                ->get();

            foreach ($transaksis as $transaksi) {
                // Kirim pengingat email
                (new TransaksiAdminController)->sendReminderEmail($transaksi);

                // Update timestamp pengingat
                $transaksi->reminder = now();
                $transaksi->save();
            }
        })->everyMinute();
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
