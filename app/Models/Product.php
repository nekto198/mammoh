<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Product extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use NotifyTrans;
    use HasAttributes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';

    // protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'main_info',
        'description',
        'product_characteristics',
        'dimensions',
        'images',
        'name',
        'slug',
        'series_id',
        'subtitle',
        'seo_title',
        'seo_description',
        'seo_alt',
        'seo_keywords'
    ];
    protected $translatable = ['name','main_info','description','product_characteristics','dimensions','subtitle'];
    protected $noImage = 'uploads/products/no-image.png';
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'images'=>'array',
    ];
    protected $fakeColumns = ['main_info'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function replicate(array $except = null) {

        return parent::replicate(['slug']);
    }

    public function firstImage(){
        if(isset($this->images[0]))
            return $this->images[0];
        else
            return  $this->noImage;
    }

    public function getSvg($path){
        echo file_get_contents(asset('storage/'.$path));
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */


    public function getImagesAttribute($value){

        if(!is_back_page() && is_null($value)){
            return [$this->noImage];
        }
        else{
            return json_decode($value);
        }
    }
    public function getDimensionsAttribute($value){
        if(!is_back_page() && (is_string($value) && $value == '')) return [];
        else return $value;
    }
    public function getDescriptionAttribute($value){
        if(is_back_page()){
            if(is_null($value)) return;
            if(is_array(json_decode($value) || is_object(json_decode($value)))){
                if(empty($value)) return;
            }
            if($value=='' ) return;
            $value = json_decode($value,JSON_OBJECT_AS_ARRAY);

            $currentValue = [];
            foreach ($value as $key=>$data){
                if(is_string($value) && (is_array(json_decode($data) || is_object(json_decode($data))))){
                    $data = json_decode($data,JSON_OBJECT_AS_ARRAY)[0];

                }
                $currentValue[$key]["title"]=$data["title"];
                $currentValue[$key]["content"]=$data["content"]["desktop"];

            }
            return json_encode($currentValue);
        }
        return json_decode($value,JSON_OBJECT_AS_ARRAY);
    }
    public function getProductCharacteristicsAttribute($value){

        if(is_back_page()){

            if(is_array(json_decode($value) || is_object(json_decode($value)))){
                if(empty($value)) return '';
                else{
                    $value = json_decode($value,JSON_OBJECT_AS_ARRAY);
                    return $value[array_key_first($value)];
                }
            }
            if(is_string($value)) return $value;


        }
        return json_decode($value,JSON_OBJECT_AS_ARRAY);
    }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */



}
