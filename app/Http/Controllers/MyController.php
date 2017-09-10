<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MyController extends Controller
{
    public function index(){
        $product=Products::all();

        $page_data['products']=$product;
        return view();
    }
}