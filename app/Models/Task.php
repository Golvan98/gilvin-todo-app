<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'project_id'
    ];

    public function project() : BelongsTo
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id');
    }
}
