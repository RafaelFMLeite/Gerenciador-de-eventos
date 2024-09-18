<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['descricao','data', 'hora', 'local_id', 'convidado_id', 'itens_id'];

    public function convidado()
    {
        return $this->belongsTo(Convidado::class);
    }

    public function itens()
    {
        return $this->belongsTo(Itens::class);
    }

    public function local()
    {
        return $this->belongsTo(Local::class);
    }
}
