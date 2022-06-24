<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';  //To connect with the table in database"Here 'employee' is the table name"
    protected $primaryKey = 'id';
    protected $fillable = ['textpost', 'imagepost', 'user_id','likes','dislikes'];

    //Tell laravel to fetch text values and set them as arrays
    // protected $casts = [
    //     'likes' => 'array',
    //     'dislikes' => 'array'
    // ];
    // protected $attributes = [
    //     'likes' => array(),
    //     'dislikes' => array()
    // ];

    //
    public function user(){
        return $this->belongsTo(User::class);   //('App\Models\User')
    }
    //
}
