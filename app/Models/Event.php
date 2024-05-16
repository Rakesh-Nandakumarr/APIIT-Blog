<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function toArray()
    {

        return [
            'title' => $this->title,
    
            'start' => $this->start_date->toISOString(),
            'end' => $this->end_date->toISOString()
        ];
    }
    
}
