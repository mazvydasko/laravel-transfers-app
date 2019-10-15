<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'user1';
        $user1->email = 'user1@user.com';
        $user1->password = Hash::make('password');
        $user1->bonus = 1000;
        $user1->acc_balance = 1000;
        $user1->unique_acc_number = uniqid();
        $user1->save();

        $user2 = new User();
        $user2->name = 'user2';
        $user2->email = 'user2@user.com';
        $user2->password = Hash::make('password');
        $user2->bonus = 1000;
        $user2->acc_balance = 1000;
        $user2->unique_acc_number = uniqid();
        $user2->save();
    }
}
