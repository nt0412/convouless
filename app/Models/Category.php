<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['category_name','category_slug','category_description','category_enable'];
    protected $primaryKey = 'category_id';
    protected $table = 'tblcategory';
}
