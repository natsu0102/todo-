<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'diary_id',
        'name',
        'importance_urgency',
        'target_time',
        'detail',
        'purpose',
        'good_future',
        'bad_future',
        'reward',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
