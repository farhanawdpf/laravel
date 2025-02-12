<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;
class Ticket extends Model
{
    use HasFactory;
    public function buses()
    {
        return $this->belongsToMany(Bus::class);
    }
}
