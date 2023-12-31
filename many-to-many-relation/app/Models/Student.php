<?php

namespace App\Models;
use App\Models\StudentDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    // public function studentDetail()
    // {
    //     return $this->hasOne(StudentDetail::class);
    // }

    public function user()
    {
        return $this->belongsToMany(User::class); //many to many
    }
}
