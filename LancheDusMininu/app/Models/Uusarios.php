<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Usuarios{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nome_usuario',
        'nome',
        'senha'
    ];
}
