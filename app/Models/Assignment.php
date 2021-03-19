<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public function completed(){
        $this->completed = true;
        $this->save();
    }

    public function user(){
        return $this->belongsTo(User::class); // select * from User where assignment_id i= 1 //eg
    }
}
