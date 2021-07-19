<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];

    public function files()
    {
        return $this->hasMany(File::class);
    }

//    public function documents()
//    {
//        return $this->hasMany(Document::class);
//    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
//        return $this->morphMany(Upload::class, 'uploadable');
    }
}
