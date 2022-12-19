<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use CrudTrait;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'comment', 'products'];
    // protected $hidden = [];
    // protected $dates = [];
    // protected $casts = [];

}
