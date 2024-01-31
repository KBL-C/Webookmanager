<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image_path',
        'slug',
        'description',
        'author',
        'price'
    ];

    protected $except = [
        'post/store'
    ];


    //to hide the datas that we don't wanna show
    protected $hidden = [
        'created_at',
        'updated_at'
    ];



    /*
    public function url(){
        return $this->id ? 'books.update' : 'books.store';
    }


    public function method(){
        return $this->id ? 'PUT' : 'POST';
    }
    */

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function comments(){
        return $this->hasMany(Comment::class, 'book_id', 'id');
    }

}
