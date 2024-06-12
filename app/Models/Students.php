<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';

    //mendefinisakan field yang boleh diisi
    protected $fillable = ['name','nim','major','class','courses_id',];

    

    //relasi ke model course(1 student memiliki 1 course/1 to 1)
    public function courses (){
        return $this->belongsTo(Courses::class);
    }
}
