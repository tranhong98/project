<?php

use App\Models\Card;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{

    const STORAGE_PATH = 'app\public';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $path = $faker->image(storage_path(self::STORAGE_PATH), 200, 200);
        $users = [
            [
                'name' => 'Trần Thị Hồng',
                'email' => 'hong@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '098777777',
                'type' => User::ADMIN_TYPE,
                'avatar' => str_replace(storage_path(self::STORAGE_PATH), '', $path),
            ],
            [
                'name' => 'Nguyễn Văn Anh',
                'email' => 'anh@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '098777980',
                'type' => User::ADMIN_TYPE,
                'avatar' => str_replace(storage_path(self::STORAGE_PATH), '', $path),
            ],
            [
                'name' => 'Phạm Thị Linh',
                'email' => 'linh@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '098777787',
                'type' => User::CUSTOMER_TYPE,
                'avatar' => str_replace(storage_path(self::STORAGE_PATH), '', $path),
            ],
        ];
        foreach ($users as $user) {
            $user = User::create($user);
            $random = $faker->randomElement([0, 1]);
            Card::create([
                'user_id' => $user->id,
                'number' => implode($faker->randomElements(range(1, 9), 8)),
                'password' => Hash::make('123456'),
            ]);
        }

        factory(User::class, config('seeder.user'))->create([
            'type' => $faker->randomElement([USER::ADMIN_TYPE, User::CUSTOMER_TYPE]),
            'avatar' => str_replace(storage_path(self::STORAGE_PATH), '', $path),
        ]);
    }
}
