<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lien extends Model
{
    use SoftDeletes;
      protected $fillable = [
        'title',
        'lien',
        'user_id',
        'categories_id'
    ];
    public function tags(){
        return $this->belongsToMany(Tag::class,'link_tag');
    }
    public function user(){
        return $this->belongsToMany(User::class,'user_link')->withPivot('access_type');
    }
}
