<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'from', 'to', 'teacher_id'];

    // protected $dates = ['from', 'to'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }



    protected function from(): Attribute
    {
        return Attribute::make(
            get: fn ($from) => date('Y-m-d', strtotime($from)),
        );
    }


    protected function to(): Attribute
    {
        return Attribute::make(
            get: fn ($to) => date('Y-m-d', strtotime($to)),
        );
    }
}