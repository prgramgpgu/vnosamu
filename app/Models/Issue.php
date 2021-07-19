<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Issue extends Model
    {
        use HasFactory;
        protected $fillable = ['title', 'year', 'issue', 'number_of_pages', 'issn', 'volume', 'number_of_volumes'];

        public function uploads()
        {
        return $this->hasMany(Upload::class);
//            return $this->morphMany(Upload::class, 'uploadable');
        }

//        public function cover()
//        {
//            return $this->hasOne(Document::class);
//        }
    }
