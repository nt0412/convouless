<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
<<<<<<< HEAD

    protected $fillable = ['category_name','category_slug','category_description','category_enable'];
    protected $primaryKey = 'category_id ';
=======
    protected $fillable = ['category_name','category_slug','category_description','category_enable'];
    protected $primaryKey = 'category_id';
>>>>>>> 5094a7d2e1f42186e14aa14a89a654d95d815ef1
    protected $table = 'tblcategory';
}
