<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Leer el archivo de datos 
        $json=File::get('database/_data/users.json');
        //Convertir los datos en un arreglo 
        $arreglo_usuarios=json_decode($json);
        //Recorrer el arreglo
        //var_dump($arreglo_usuarios);
        foreach($arreglo_usuarios as $usuario){
            //Por cada elemento del arreglo crear un <<entity>>
            //Registrar el usuario en bd
            // Se utiliza el metodo ::create
            User::create([
                "name" => $usuario->email,
                "email" => $usuario->email,
                "password" => Hash::make($usuario->password)
            ]);
        }
    }
}
