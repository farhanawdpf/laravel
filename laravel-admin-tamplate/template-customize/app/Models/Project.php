<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function deployments()
    {
        return $this->hasManyThrough(Deployment::class, Environment::class);
    }
    public function environment()
    {
        return $this->hasMany(Environment::class);
    }
}
