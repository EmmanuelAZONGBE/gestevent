<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [

           [ 'last_name'=>'DOSSA',
            'first_name'=>'Firmin',
            'statut'=>'client',
            'phone'=>'78142569',
            'email'=>'firmin@gmail.com',
            'adresse'=>'Cotonou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
        ],

        [
            'last_name'=>'DOSSOUSA',
            'first_name'=>'Rufin',
            'statut'=>'client',
            'phone'=>'78147845',
            'email'=>'rufin@gmail.com',
            'adresse'=>'Parakou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'GOHOUN',
            'first_name'=>'Akides',
            'statut'=>'client',
            'phone'=>'20472569',
            'email'=>'akides@gmail.com',
            'adresse'=>'Calavi',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'MIGAN',
            'first_name'=>'Chadrack',
            'statut'=>'client',
            'phone'=>'78652569',
            'email'=>'firmin@gmail.com',
            'adresse'=>'Natitingou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'KOUASSI',
            'first_name'=>'Esther',
            'statut'=>'prestataire',
            'phone'=>'52659900',
            'email'=>'esther@gmail.com',
            'adresse'=>'Djougou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'ADNANE',
            'first_name'=>'Nano',
            'statut'=>'prestataire',
            'phone'=>'74558922',
            'email'=>'nano@gmail.com',
            'adresse'=>'Porto-Novo',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'CADNEL',
            'first_name'=>'Moryl',
            'statut'=>'prestataire',
            'phone'=>'44112578',
            'email'=>'moryl@gmail.com',
            'adresse'=>'Cotonou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'YEPKE',
            'first_name'=>'Jeremie',
            'statut'=>'prestataire',
            'phone'=>'12548796',
            'email'=>'jeremie@gmail.com',
            'adresse'=>'Cotonou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'ATTOLOU',
            'first_name'=>'Bohr',
            'statut'=>'prestataire',
            'phone'=>'78142569',
            'email'=>'bohr@gmail.com',
            'adresse'=>'Parakou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'AZONHIN',
            'first_name'=>'Tesla',
            'statut'=>'organisateur',
            'phone'=>'78566120',
            'email'=>'tesla@gmail.com',
            'adresse'=>'Porto-Novo',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'AFFOUDA',
            'first_name'=>'Gisele',
            'statut'=>'organisateur',
            'phone'=>'0232366',
            'email'=>'gisele@gmail.com',
            'adresse'=>'Djougou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'AGBAGLI',
            'first_name'=>'Jean',
            'statut'=>'organisateur',
            'phone'=>'45896233',
            'email'=>'jean@gmail.com',
            'adresse'=>'Natitingou',
            'usertype'=>'0',
            'password' =>'azertyuiop'
            ],

            [
            'last_name'=>'Admin',
            'first_name'=>'Admin',
            'statut'=>'',
            'phone'=>'78142569',
            'email'=>'firmin@gmail.com',
            'adresse'=>'Cotonou',
            'usertype'=>'1',
            'password' =>'azertyuiop'
            ],
        ];
        User::insert($users);
    }
}
