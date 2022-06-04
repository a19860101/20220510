<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class SearchController extends Controller
{
    //
    public function searchResult(Request $request){

        return $request;
        // $result = DB::table('products')
        // ->where('title','like','%'.$request->q.'%')
        // ->orWhere('title','like','%'.$request->q.'%')
        // ->whereBetween('title','like','%'.$request->q.'%')
        // ->get();

        // DB::select('');

        // $users = DB::table('users')
        //     ->where('votes', '>', 100)
        //     ->orWhere(function($query) {
        //         $query->where('name', 'Abigail')
        //               ->where('votes', '>', 50);
        //     })
        //     ->get();
        return  view('searchResult',compact('results'));
    }
}
