<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;


class Article extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;

    protected $fillable = [
        'type', 'title', 'detail', 'image', 'views'
    ];
}
