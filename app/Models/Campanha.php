<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campanha extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'nome',
    ]; 
    public function grupo_cidades(){ 
        return $this->hasMany(GrupoCidade::class);
    }
    public function produtos(){ 
        return $this->hasMany(Produto::class);
    }
    public function delete(){ 
        $this->produtos()->delete();
        $this->grupo_cidades()->delete();    
        return parent::delete();
    }
}
