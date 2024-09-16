<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensComida extends Model
{
    use HasFactory;

    protected $fillable = ['quantidade', 'comida_id'];

    public function comida(){
        return $this->belongsTo(Comida::class);
    }
}
