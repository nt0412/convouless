<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tblmain_category";
    protected $primaryKey = 'main_cate_id';
    protected $guarded = [];

}
