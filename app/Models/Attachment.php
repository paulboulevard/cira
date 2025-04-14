php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'bug_id',
        'name',
    ];

    public function bug()
    {
        return $this->belongsTo(Bug::class);
    }
}