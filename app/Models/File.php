<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function Issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
