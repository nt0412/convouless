<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newshot1 extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tblnewshot1";
    protected $primaryKey ='id';
    protected $guarded = [];

    // Gio thu truy xuat cai nay xem dung chua ne
    // Cach dat ten: so nhieu cua category -> categories
    public function category(){
        // Model, foreign key of current table, owner table id
        return $this->belongsTo(Category::class,'category_id','category_id');
    }
}
