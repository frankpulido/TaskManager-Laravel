<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'project_id',
        'task_kind', // enum corresponding to set $skills in Programmer
        'task_status', // updated by triggers on dates below
        'task_description',
        'programmer_id', // not nullable
        'date_deadline', // NEW ATTRIBUTE - NOT IN JSON PERSISTENCE VERSION
        'date_init',
        'date_delivered', // If not approved this attribute may be overwritten later when delivered for second time.
        'date_approved'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
