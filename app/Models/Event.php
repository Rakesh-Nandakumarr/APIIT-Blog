<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'start_date',
        'end_date',
        'category_id'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function toArray()
    {

        return [

            'title' => $this->title,
            'url' => $this->slug,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'start' => $this->start_date->toISOString(),
            'end' => $this->end_date->toISOString(),
            'category_id' => $this->category_id,
        ];
    }

    public function getThumbnail()
    {
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }

        return '/storage/' . $this->thumbnail;
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    
}
