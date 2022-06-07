<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status'
    ];

    /**
     * Defines the belongs to user relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Defines the has many notes relationship
     */
    public function notes()
    {
        return $this->hasMany(JobNote::class);
    }
}
