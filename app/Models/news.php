<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model khong dc de ky tu dau thuong nha
class News extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = "tblnews";
    protected $primaryKey ='news_id';
    protected $guarded = [];

    // Gio thu truy xuat cai nay xem dung chua ne
    // Cach dat ten: so nhieu cua category -> categories
    public function category(){
        // Model, foreign key of current table, owner table id
        return $this->belongsTo(Category::class,'category_id','category_id');
    }
}
