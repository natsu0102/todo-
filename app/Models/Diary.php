<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'task_id',
        'evaluation',
        'good_thing',
        'improvement',
        'feedback',
    ];
    public function tasks()   
    {
        return $this->hasMany(Task::class);  
    }
}
