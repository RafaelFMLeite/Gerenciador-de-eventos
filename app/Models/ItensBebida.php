<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensBebida extends Model
{
    
    use HasFactory;
    
    protected $fillable = ['quantidade', 'bebida_id'];

    public function bebida(){
        return $this->belongsTo(Bebida::class);
    }
}
