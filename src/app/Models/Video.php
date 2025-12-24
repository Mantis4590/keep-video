<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'file_path',
        'thumbnail_path',
    ];

    // 動画とユーザーの紐づき
    public function user() {
        return $this->belongsTo(User::class);
    }
}
