<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{

    // Aagar saat dihapus data tidak hilang 100%.
    use SoftDeletes;

    // $fillable : Digunakan agar user hanya dapat insert data ke coloum Name dan Slug.
    protected $fillable = [
        'name', // (Learn Laravel) = Web Name.
        'slug', // (learn-laravel) = Slug.
    ];

    // Agar saat 'name' berubah 'slug' juga akan otomatis berubah.
    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Untuk mengatur relation ship.
    public function courses(): HasMany{
        return $this->hasMany(course::class);
    }
}
