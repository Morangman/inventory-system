<?php

declare(strict_types = 1);

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

/**
 * Class UsersSeeder
 */
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $name = 'admin';
        $password = 'qwerty';

        /** @var User $user */

        $user = User::query()->updateOrCreate([
            'first_name' => ucfirst($name),
            'last_name' => ucfirst($name),
            'email' => "{$name}@mail.com",
            'password' => $password,
            'is_admin' => true,
        ]);
    }
}
