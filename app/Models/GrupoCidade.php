<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoCidade extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'nome', 'campanha_id'
    ];
    public function cidades(){ 
        return $this->hasMany(Cidade::class);
    }

    public function campanhas(){ 
        return $this->belongsTo(Campanha::class);
    }
    public function delete(){  
        $this->cidades()->delete();    
        return parent::delete();
    }
}
