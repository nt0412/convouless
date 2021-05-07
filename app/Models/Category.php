<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['category_name','category_description','category_enable','Category_Slug'];
    protected $primaryKey = 'Category_ID';
    protected $table = 'tblcategory';

}
