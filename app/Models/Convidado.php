<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convidado extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome',
        'email',
        'celular',
        'usuario_id',
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
