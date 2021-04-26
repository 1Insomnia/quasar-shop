<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Audrey',
                'last_name' => 'Aguilar',
                'email' => 'audrey_aguilar@gmail.com',
                'password' => \Hash::make('Z6A}sHgwL=e]jW6^')
            ],
            [
                'first_name' => 'Adeline',
                'last_name' => 'Robertson',
                'email' => 'adeline_robertson@gmail.com',
                'password' => \Hash::make('*vB&Q8jCqk.+gyTD')
            ],
            [
                'first_name' => 'Stacey',
                'last_name' => 'Watterson',
                'email' => 'stacey_watterson@gmail.com',
                'password' => \Hash::make("f?ZjsqU2S_`Y'}~q")
            ],
            [
                'first_name' => 'Ralph',
                'last_name' => 'Aguirre',
                'email' => 'ralph_aguirre@gmail.com',
                'password' => \Hash::make("C4$3?dJR2<JTt*y!")
            ],
            [
                'first_name' => 'Walter',
                'last_name' => 'Peck',
                'email' => 'walter_peck@gmail.com',
                'password' => \Hash::make("#4+#9L4d%>dEpQsS")
            ],
            [
                'first_name' => 'Tameka',
                'last_name' => 'Ostrowski',
                'email' => 'TamekaFOstrowski@armyspy.com',
                'password' => \Hash::make("33e[8JsjM=/#vrYL")
            ],
            [
                'first_name' => 'Ramon',
                'last_name' => 'Ringler',
                'email' => 'RamonTRingler@rhyta.com',
                'password' => \Hash::make("vY6}ABaaaaaaaaa=L4wtd")
            ],
            [
                'first_name' => 'Chester',
                'last_name' => 'Tidd',
                'email' => 'ChesterJTidd@teleworm.us',
                'password' => \Hash::make("LZ7Fz]8`kG:+X[/D")
            ],
            [
                'first_name' => 'Jennifer',
                'last_name' => 'Silva',
                'email' => 'j.silva@outlook.com',
                'password' => \Hash::make("Nmd8fsWGtLpUvxKJ")
            ],
            [
                'first_name' => 'Anthony',
                'last_name' => 'Johnson',
                'email' => 'AnthonyMJohnson@rhyta.com',
                'password' => \Hash::make("KfkqvSgp6Ux8y2Mz")
            ],
            [
                'first_name' => 'Francis',
                'last_name' => 'Fuston',
                'email' => 'FrancisTFuston@rhyta.com',
                'password' => \Hash::make("AZVGsRZ5sn4yQwtN")
            ],
            [
                'first_name' => 'Thomas',
                'last_name' => 'Drake',
                'email' => 'thomas.drake@gmail.com',
                'password' => \Hash::make("AZVGsRZ5sn4yQwtN")
            ],
            [
                'first_name' => 'Willie',
                'last_name' => 'Scholl',
                'email' => 'Willie.Scholl@gmail.com',
                'password' => \Hash::make("ZCZp57gXG6kPBSAm")
            ],
            [
                'first_name' => 'Joseph',
                'last_name' => 'Keene',
                'email' => 'Keene.Joseph@yahoo.com',
                'password' => \Hash::make("!%4}TwG(v\//M4;C7")
            ],
            [
                'first_name' => 'Joseph',
                'last_name' => 'Kan',
                'email' => 'Kan.Joseph@yahoo.com',
                'password' => \Hash::make("T7]'(Lsk,8=3'*j{")
            ],
            [
                'first_name' => 'Andrea',
                'last_name' => 'Ward',
                'email' => 'AndreaRWard@jourrapide.com',
                'password' => \Hash::make("q8D!T8}MY5Eam)j")
            ],
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
