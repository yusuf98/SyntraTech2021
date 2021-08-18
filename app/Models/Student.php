<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    // when we use mass assignment helpers in our controllers, we need to grant permission to the columns wich are mass assignable
    // First method - add all column names manually
    // protected $fillable = ['name','email'];
    
    // Second
    protected $guarded = [];
    public function course() {
        return $this->belongsToMany(Course::class);
    }
}
