<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensEvento extends Model
{
    use HasFactory;

    protected $fillable = ['evento_id', 'itens_comida_id', 'itens_bebida_id'];

    public function itens_comida() {
        return $this->belongsTo(ItensComida::class);
    }

    public function itens_bebida() {
        return $this->belongsTo(ItensBebida::class);
    }


}
