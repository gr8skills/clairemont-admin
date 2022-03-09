<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['excerpt'];

    public function getExcerptAttribute()
    {
        return strip_tags(substr($this->getAttribute('content'), 0, 300)) . ' ...';
    }
}
