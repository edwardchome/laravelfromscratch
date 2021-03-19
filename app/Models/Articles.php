<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

   protected $fillable = ['title','excerpt','body']; // this protect from malicious users who may want to update say
                                                      //subscription to "true" while not subscribed eg

    //protected $guarded = []; // this allows all fields to be updated/ changed do this if you are sure there is no sensitive
                            //data which might be changed by user
                           // it means I understand everything hey laravel dont guard any thing

    //if you use a slug you have to override the method getRouteKeyName() in the controller and select the slug column
//    public function getRouteKeyName(){
//        return 'slug'; // Article::where('slug',$article)->first()
//    }

     public function author(){
         return $this->belongsTo(User::class,'user_id'); // select * from User where article_id i= 1 //
     }

     public function tags(){
         return $this->belongsToMany(Tags::class);
     }
}
