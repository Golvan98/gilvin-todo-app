<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectUser extends Model
{
    use HasFactory;


    public function project(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id');
    }

    public function projectMember(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
