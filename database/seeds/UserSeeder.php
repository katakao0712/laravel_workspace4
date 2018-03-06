<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Supprot\Facades\DB;

use Faker\Factory as Faker;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        // Userテーブルを一旦削除 truncateはIDもリセットされる
        User::truncate();

        // Fakerを使う ダミーデータを作成してくれる
        $faker = Faker::create('ja_JP');

        // insert レコードを25個挿入
        for($i=0;$i<25;$i++)
        {
            User::create([
                'name' => $faker->userName(),
                'email' => $faker->unique()->email(),
                'password' => $faker->password()
            ]);
        }
    }
}
