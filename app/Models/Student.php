<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'tempatlahir',
        'tanggallahir',
    ];

    public function nisn(){
        return $this->hasOne(Nisn::class, 'id_student');
    }
}
