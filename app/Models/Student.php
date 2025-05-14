<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'gender', 'dob',
        'address_line_1', 'class_id', 'section_id', 'roll_number',
        'admission_date', 'guardian_name', 'guardian_relation', 'guardian_email', 'guardian_phone', 'status',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendanceForDate($date)
    {
        return $this->attendances->firstWhere('date', $date);
    }
    
}
