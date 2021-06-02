<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        return view('searchajax');
    }

    function getSearchAjax(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');

            // trong bảng tblnews tim kiem theo news_title
            $data = DB::table('tblnews')
                ->where('news_id', 'LIKE', "%{$query}%")
                ->orWhere('news_title', 'LIKE', "%{$query}%")
                // ->orWhere('news_title', 'LIKE', "%{$query}%")
                ->get();

            // // trong bảng tblnews tim kiem theo news_id
            // $data = DB::table('tblnews')
            // ->where('news_id', 'LIKE', "%{$query}%")
            // ->get();


            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                // chọn nhưng không có link
                $output .= '
                    <li><a href="#" data="' . $row->news_slug . '">' . $row->news_id . ' - ' . $row->news_title . '</a></li>
               ';
                //    click là mở trang mới với tin đã tìm
            //     $output .= '
            //         <li><a href="' . url('/') . "/" . $row->news_slug . '" data="' . $row->news_slug . '">' . $row->news_id . ' - ' . $row->news_title . '</a></li>

            //    ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
