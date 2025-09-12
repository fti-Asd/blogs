<?php

namespace App\Console\Commands;

use App\Enums\UserGender;
use App\Enums\UserStatus;
use App\Models\Admin;
use Hash;
use Illuminate\Console\Command;
use Illuminate\Testing\Fluent\Concerns\Has;

class generateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-super-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Admin::create([
            'first_name' => "فاطمه",
            'last_name' => "اسدی",
            'national_code' => "2081108181",
            'gender' => UserGender::FEMALE->value,
            'mobile' => "09102524337",
            'email' => "ftiasg1401@gmail.com",
            'role_id' => 1,
            'username' => "fatemehAdmin",
            'password' => Hash::make(123456),
        ]);

        $this->info('generated successfully');
    }
}
