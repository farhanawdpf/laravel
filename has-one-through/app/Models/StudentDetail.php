<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;

    protected $table = 'student_details';

    protected $fillable = [
        'student_id',
        'alternate_phone',
        'course',
        'roll_no'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
