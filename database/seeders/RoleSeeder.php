<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles() as $role) {
            Role::factory()->create($role);
        }
    }

    public function roles(): array
    {
        return [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'moderator',
            ],
            [
                'name' => 'user',
            ],
        ];
    }
}
