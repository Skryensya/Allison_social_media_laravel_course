<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table ='images';

    //relacion One to many / de uno a muchos
    public function comments(){
        return $this->hasMany(comment::class)->orderBy('id', 'desc');
    }

    //Relacion one to many
    public function likes(){
        return $this->hasMany(like::class);
    }

    //relacion many to one / de uno a muchos
    public function user(){
        return $this->belongsTo(user::class, 'user_id');
    }
}
