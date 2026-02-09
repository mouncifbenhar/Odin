<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Tag extends Model
{
     protected $fillable = [
       'tag',
       'user_id'
    ];
       public function liens(){
           return $this->belongsToMany(Lien::class,'link_tag');
       }
}
