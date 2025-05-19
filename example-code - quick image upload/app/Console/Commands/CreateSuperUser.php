<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateSuperUser extends Command
{
    protected $signature = 'make:superuser';
    protected $description = 'Create a superuser with admin privileges';

    public function handle()
    {
        $email = $this->ask('Enter superuser email:');
        $password = $this->secret('Enter superuser password:');

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'password' => $password,
                'type' => '1',
                'role' => 'Admin',

            ]
        );

        $this->info("Superuser {$user->email} created successfully!");
    }
}
