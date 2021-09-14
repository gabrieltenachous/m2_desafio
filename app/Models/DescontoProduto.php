<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DescontoProduto extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'desconto_id', 'produto_id','total'
    ];
    public function desconto(){ 
        return $this->belongsTo(Desconto::class);
    }
    public function produto(){ 
        return $this->belongsTo(Produto::class);
    }
    
}
