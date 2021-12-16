<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename', 'title',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

//    public function uploadable()
//    {
//        return $this->morphTo();
//    }
}
