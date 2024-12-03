<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    protected $table = 'onibus';
    protected $fillable = [
        'nome',
        'marca',
        'ano',
        'latitude',
        'longitude',
        'user_id',
        'ativo'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
