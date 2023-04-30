<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name','email', 'phone', 'birthday', 'avatar', 'qualification'];

    const AVATARS_PATH = 'images/teacher/avatars/';

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function($avatar){
                if($avatar && file_exists($this->getAvatarPath()))
                {
                    return asset(Teacher::AVATARS_PATH . $avatar);
                }
                return '';
            },
        );
    }

    function getAvatarPath(){
        if($this->getRawOriginal('avatar'))
        {
            return public_path(Teacher::AVATARS_PATH . $this->getRawOriginal('avatar'));
        }
        return '';
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'teacher_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'teacher_id');
    }

    public function groupStudents()
    {
        return $this->hasManyThrough(
            GroupStudent::class,
            Group::class,
            'teacher_id',
            'group_id',
            'id',
            'id'
        );
    }

    public function groupDays()
    {
        return $this->hasManyThrough(
            GroupDay::class,
            Group::class,
            'teacher_id',
            'group_id',
            'id',
            'id'
        );
    }
}
