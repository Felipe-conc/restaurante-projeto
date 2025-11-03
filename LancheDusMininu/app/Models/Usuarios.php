<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Usuarios
{
    public static function all()
    {
        return DB::table('usuarios')->get();
    }

    public static function find($id)
    {
        return DB::table('usuarios')->where('cod_usuario', $id)->first();
    }

    public static function create($data)
    {
        return DB::table('usuarios')->insert($data);
    }

    public static function updateUser($id, $data)
    {
        return DB::table('usuarios')->where('cod_usuario', $id)->update($data);
    }

    public static function deleteUser($id)
    {
        return DB::table('usuarios')->where('cod_usuario', $id)->delete();
    }
}
