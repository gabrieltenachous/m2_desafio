<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desconto extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'nome', 'desconto'
    ];

    public function desconto_produtos(){ 
        return $this->hasMany(DescontoProduto::class);
    }
    public function delete(){  
        $this->desconto_produtos()->delete();    
        return parent::delete();
    }
}
