<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new User();
        $administrator->username = 'administrator';
        $administrator->name = 'Site Administrator';
        $administrator->email = 'administrator@larashop.test';
        $administrator->roles = json_encode(['ADMIN']);
        $administrator->password = Hash::make('larashop');
        $administrator->avatar = 'saat-ini-tidak-ada-file.png';
        $administrator->address = 'Banjarmlati, Kediri';

        $administrator->save();

        $this->command->info('User admin berhasil diinsert');
    }
}
