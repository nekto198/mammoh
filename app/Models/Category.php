<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use \Backpack\CRUD\app\Models\Traits\CrudTrait;

class Category extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;
    use HasTranslations;
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status'

    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "uploads";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
