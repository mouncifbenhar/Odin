<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'title',
        'user_id'
    ];
    public function liens(){
        return $this->hasMany(Lien::class,'categories_id');
    }
}
