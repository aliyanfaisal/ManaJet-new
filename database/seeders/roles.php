<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                "Project Manager",
                "User with permission to set project with the highest level of access"
            ],

            [
                "Web Developer",
                "User with abilities to build websites"
            ],
            [
                "Mobile Developer",
                "user with abilities to build mobile applications"
            ],
            [
                "Frontend Developer",
                "user with abilities to build front side of website",
                2
            ],
            [
                "Backend Developer",
                "user with abilities to build backend scripting",
                3
            ],
            [
                "Media Marketer",
                "user with abilities to advertise"
            ]
        ];

        foreach($roles as $role){
            \App\Models\Role::create([
                "role_name"=> $role[0],
                "role_description"=> $role[1],
                "parent_id"=>isset($role[3])? $role[3] : null,
                "status"=> "active"
            ]);
        }
    }
}