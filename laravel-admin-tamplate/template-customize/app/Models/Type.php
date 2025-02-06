<?php

namespace App\Models;
use App\Models\SubType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public function subtype () {
        return $this->hasOne(SubType::class);
    }
}
