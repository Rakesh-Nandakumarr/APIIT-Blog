<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Job extends Model
{
    use softDeletes;
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'company',
        'description',
        'qualifications',
        'link',
        'active',
        'contact',
        'reason',
        'published_at',
        'user_id'
    ];

    public function getThumbnail()
    {
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }

        return '/storage/' . $this->thumbnail;
    }

    public function shortBody($words = 30): string
    {
        return Str::words(strip_tags($this->description), $words);
    }

    use HasFactory;
}
