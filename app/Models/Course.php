<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'tumbnail',
        'about',
        'isz-popular',
        'category_id',
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attribute['slug'] = Str::slug($value); // use Illuminate\Support\Str;
    }

    public function benefits(): HasMany
    {
        return $this->HasMny(CourseBenefit::class);
    }

    public function courseSections(): HasMany
    {
        return $this->hasMany(CourseSection::class);
    }

    public function courseStudents(): HasMany
    {
        return $this->hasMany(courseStudent::class, 'course_id');
    }

    public function courseMentors(): HasMany
    {
        return $this->hasMany(CourseMentor::class, 'course_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class, 'category_id');
    }
}

