<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tblfooter";
    // Thay vi phai dien cac column neu 1 table co 20 30 column ma dien vay gay~ tay, minh co cach tot hon
    // protected $fillable = ['category_name','category_slug','category_description','category_enable'];

    // Cach nay nom na no se guard (bao ve) nhung column minh dien khong cho insert,update, con lai se duoc insert update
    protected $guarded = [];
    protected $primaryKey = 'id';

}
