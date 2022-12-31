<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(25)->create();

        $user = User::create([ //ID = 1 (admin)
            'name'              => "nada",
            'lastname'          => 'ahmed',
            'username'          => 'nada_ahmed',
            'avatar'            => '/assets/website/images/nada.jpg',
            'email'             => 'Nada@info.com',
            'password'          => '$2y$10$zzd0BbVIty8VoydyRxCw4eyhYcxd7osHkIE7sKt/EcwGq1phPa7Ia', // password (is encrypted): 123456789
            'gender'            => 'female',
            'user_type'         => 'admin',
            'phone'             => '0110090440',
            'dob'               => "1999-9-26",
            'bio'               => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores perspiciatis consectetur earum nemo, nostrum fugit autem tempore suscipit voluptas quo praesentium saepe nulla laborum reiciendis! Velit vel perferendis maxime minima.',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
        ]);

        $user = User::create([ //ID = 2 (moderator)
            'name'              => "User_moderator",
            'username'          => 'ModeratorDev',
            'email'             => 'moderator@gmail.com',
            'password'          => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is encrypted): 123456789
            'gender'            => 'female',
            'user_type'         => 'moderator',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
        ]);


        $user = User::create([ //ID = 3 (customer)
            'name'              => "customer",
            'username'          => 'Nada Dev',
            'email'             => 'customer@gmail.com',
            'password'          => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is encrypted): 123456789
            'gender'            => 'female',
            'user_type'         => 'customer',
            'phone'             => '0170090440',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
        ]);


        $user = User::create([ //ID = 4 (supplier)
            'name'              => "Raymond",
            'username'          => 'Raymond',
            'email'             => 'supplier@gmail.com',
            'password'          => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is encrypted): 123456789
            'user_type'         => 'vendor',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
        ]);

    }
}
