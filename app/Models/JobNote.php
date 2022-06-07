<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobNote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'note',
    ];

    /**
     * Defines belongs to job relationship
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
