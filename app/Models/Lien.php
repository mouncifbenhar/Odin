<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Lien extends Model
{
      protected $fillable = [
        'title',
        'lien',
        'user_id',
        'categories_id'
    ];
    public function tags(){
        return $this->belongsToMany(Tag::class,'link_tag');
    }
}
