<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * \CustomUsersTableSeeder
 *
 * Test users for Playground using Sanctum
 */
class CustomUsersTableSeeder extends Seeder
{
    /**
     * @var array<string, mixed> The default models.
     */
    protected $models = [
        'root@example.com' => [
            'name' => 'Root Toor',
            'role' => 'root',
            'roles' => [],
            'description' => 'User: root',
            'status' => 1,
        ],
        'admin@example.com' => [
            'name' => 'Admin Nimda',
            'role' => 'admin',
            'roles' => [
                'user',
                'publisher',
                'sales',
            ],
            'description' => 'User: admin',
            'status' => 1,
        ],
        'manager@example.com' => [
            'name' => 'Manager Reganam',
            'role' => 'manager',
            'roles' => [
                'user',
                'publisher',
                'sales',
            ],
            'description' => 'User: manager',
            'status' => 1,
        ],
        'mark@example.com' => [
            'name' => 'Mark Kram',
            'role' => 'sales',
            'roles' => [
                'admin',
                'user',
                'publisher',
            ],
            'description' => 'User: Mark - sales',
            'status' => 1,
        ],
        'mike@example.com' => [
            'name' => 'Mike Ekim',
            'role' => 'sales',
            'roles' => [
                'admin',
                'user',
                'publisher',
            ],
            'description' => 'User: Mike - sales assistant',
            'status' => 1,
        ],
        'sara@example.com' => [
            'name' => 'Sara Aras',
            'role' => 'sales',
            'roles' => [
                'admin',
                'user',
                'publisher',
            ],
            'description' => 'User: Sara - sales',
            'status' => 1,
        ],
        'erin@example.com' => [
            'name' => 'Erin Nire',
            'role' => 'sales',
            'roles' => [],
            'description' => 'User: Erin - sales',
            'status' => 1,
        ],
        'bob@example.com' => [
            'name' => 'Bob',
            'role' => 'sales',
            'roles' => [
                'user',
            ],
            'description' => 'User: Bob - sales',
            'status' => 1,
        ],
        'tim@example.com' => [
            'name' => 'Tim Mit',
            'role' => 'sales',
            'roles' => [
                'user',
            ],
            'description' => 'User: Tim - sales',
            'status' => 1,
        ],

        // Special roles

        'client@example.com' => [
            'name' => 'Client Tneilc',
            'role' => 'partner',
            'roles' => [
                'user',
            ],
            'description' => 'Client',
            'status' => 1,
        ],

        'guest@example.com' => [
            'name' => 'Guest Tseug',
            'role' => 'guest',
            'roles' => [],
            'description' => 'Guest',
            'status' => 1,
        ],

        'partner@example.com' => [
            'name' => 'Partner Rentrap',
            'role' => 'partner',
            'roles' => [
                'user',
            ],
            'description' => 'Partner',
            'status' => 1,
        ],

        'user@example.com' => [
            'name' => 'User Resu',
            'role' => 'user',
            'roles' => [
            ],
            'description' => 'User',
            'status' => 1,
        ],

        'vendor@example.com' => [
            'name' => 'Vendor Rodnev',
            'role' => 'vendor',
            'roles' => [
                'user',
            ],
            'description' => 'Vendor',
            'status' => 1,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = config('auth.testing.password');
        $test_password_hashed = config('auth.testing.hashed');
        // dump([
        //     '__METHOD__' => __METHOD__,
        //     '__FILE__' => __FILE__,
        //     '__LINE__' => __LINE__,
        //     '$password' => $password,
        //     '$test_password_hashed' => $test_password_hashed,
        // ]);
        if (empty($password) || ! is_string($password)) {
            $password = md5(Carbon::now()->format('c'));
            $test_password_hashed = false;
        }

        if (! $test_password_hashed) {
            $password = Hash::make($password);
        }

        foreach ($this->models as $email => $meta) {

            if (empty($meta) || ! is_array($meta)) {
                $meta = [];
            }

            $model = User::where('email', $email)->first();

            if (empty($model)) {
                $model = new User([
                    'name' => empty($meta['name']) || ! is_string($meta['name']) ? 'Some Name' : $meta['name'],
                    // 'description' => empty($meta['description']) || !is_string($meta['description']) ? '' : $meta['description'],
                    // 'active' => true,
                    'email' => $email,
                    // 'role' => empty($meta['role']) || ! is_string($meta['role']) ? '' : $meta['role'],
                ]);
            } else {
                $model->update([
                    'name' => empty($meta['name']) || ! is_string($meta['name']) ? 'Some Name' : $meta['name'],
                    // 'description' => empty($meta['description']) || !is_string($meta['description']) ? '' : $meta['description'],
                    // 'active' => true,
                    // 'role' => empty($meta['role']) || ! is_string($meta['role']) ? '' : $meta['role'],
                ]);
            }

            // $roles = [];

            // if (is_array($meta['roles'])) {
            //     foreach ($meta['roles'] as $role) {
            //         if (! empty($role)
            //             && is_string($role)
            //             && ! in_array($role, $roles)
            //             && $role !== $model->role
            //         ) {
            //             $roles[] = $role;
            //         }
            //     }
            // }

            // $model->setAttribute('roles', $roles);
            // dd([
            //     '__METHOD__' => __METHOD__,
            //     '__FILE__' => __FILE__,
            //     '__LINE__' => __LINE__,
            //     '$password' => $password,
            //     '$test_password_hashed' => $test_password_hashed,
            // ]);

            // Reset the password
            $model->password = $password;
            $model->save();
        }
    }
}
