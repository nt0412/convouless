<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $fillable = [ 'category_id','date_posted','news_title','news_slug','news_content','news_metatile','news_summary','news_img','news_enable','date_updated','post_id','author_id'];
    protected $primaryKey = 'news_id';
    protected $table = 'tblnews';
}
