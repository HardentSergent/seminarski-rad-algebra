<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Navigation extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'navigations';
    public $primaryKey = 'id';
    protected $fillable = ['title', 'slug', 'body'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

