<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $additional_attributes = ['course_price', 'course_description'];
    // de relatiemethode is belangrijk -> conventie enkelvoud van de referentie tabel
    public function location() {
        return $this->belongsTo(Location::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    // pivot(course_student - enkelv benaming + alphabetic c voor s) (many2many) relatie is a breeze in laravel
    public function student() {
        return $this->belongsToMany(Student::class);
    }
    public function getNameAttribute($value) {
        return ucfirst($value);
    }

    public function getPriceAttribute($value) {
        return "€ {$value}";
    }



    public function getCoursePriceBrowseAttribute() {

        if ($this->price < 350) {
            return "{$this->name} - ({$this->price}) - BUDGET";
        }else {
            return "{$this->name} - ({$this->price}) - PREMIUM";
        }
    }

    public function getNameBrowserAttribute() {
        if($this->name){ return 'Nog geen waarde ingevuld';}
    }

    public function getCourseDescriptionAttribute() {
        return "{$this->name} - ({$this->description})";
    }
    // the name between get and Attribute is the name of the column
}
