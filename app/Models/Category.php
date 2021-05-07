<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
<<<<<<< HEAD
    protected $fillable = ['CategoryName','CategoryDescription','Enable','CategorySlug'];
    protected $primaryKey = 'Category_ID';
    protected $table = 'category';
=======
    protected $fillable = ['category_name','category_description','category_enable'];
    protected $primaryKey = 'category_id ';
    protected $table = 'tblcategory';
>>>>>>> efd7167480278a9c233a03121f60ab4c55336c67

}
