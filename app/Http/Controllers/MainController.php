<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slide;
use App\Models\Advertising;
use App\Models\Stock;
use App\Models\Blocks;
use App\Models\Banner;
use App\Models\Servises;
use App\Models\Social_network;

class MainController extends Controller
{
    public function home(){
        $slide = SLide::all();
        $advertising = Advertising::first();
        $stock = Stock::first();
        $blocks = Blocks::all();
        $banner = Banner::first();
        $servises = Servises::all();
        return view('welcome', ['slide' => $slide, 'advertising' => $advertising, 'stock' => $stock, 'blocks' => $blocks, 'banner' => $banner, 'servises' => $servises]);
    }
    public function product($id){
        return view('product');
    }
}