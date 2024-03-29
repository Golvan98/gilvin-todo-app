<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'project_name',
        'project_description',
        'ownerId'
    ];


    public function tasks(): HasMany
    {
        return $this->hasMany(\App\Models\Task::class, 'task_id');
    }

    public function megaproject(): HasMany
    {
        return $this->hasMany(\App\Models\ProjectUser::class, 'project_id');
    }
}
