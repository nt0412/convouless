<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
<<<<<<< HEAD

    protected $fillable = ['category_name','category_description','category_enable','category_slug'];
    protected $primaryKey = 'category_id ';
    protected $table = 'tblcategory';
=======
    protected $fillable = ['category_name','category_description','category_enable','Category_Slug'];
    protected $primaryKey = 'Category_ID';
    protected $table = 'tblcategory';

>>>>>>> de569ab64b2100d53529468b4659dd8ddf9cb819
}
