<?php

namespace App\Http\Controllers;

use App\model\Brands;
use App\model\Medicines;
use App\model\View_permission;
use App\model\Stocks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\model\Category;
use App\model\Sub_Category;
use App\model\Unit;
use App\model\Products;
use App\model\Logins;
use App\model\Company;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Request;
use Session;
use Maatwebsite\Excel\Facades\Excel;

class Brand extends Controller
{
    public function show()
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............

        $page_data['brand'] = Brands::get();
        return view('pos.pages.brand.show', $page_data);
    }

    public function post(Request $request){
        $c = new Brands();
        $c->name = $request->input('name');
        $c->save();
        return 1;
    }

    public function getExcel(Request $request)
    {
        //dd($req->all());

        if ($request->hasFile('file')) {

            $path = $request->file('file')->getRealPath();

            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                $duplicateM='';
                foreach ($data->toArray() as $key => $v) {
                    //$insert[] = ['name' => $v['name'], 'brand_id' => $v['brand'], 'power' => $v['power'],'created_at'=>date('Y-m-d')];
                    $tmpM=Medicines::where('name',$v['name'])->get();
                    if(sizeof($tmpM)==0){
                        $brandID=0;
                        $tmpB=Brands::where('name',$v['brand'])->get();
                        if(sizeof($tmpB)==0){
                            $brnd=new Brands();
                            $brnd->name=$v['brand'];
                            $brnd->created_at=date('Y-m-d');
                            $brnd->save();
                            $brandID=$brnd->id;
                        }else{
                            $brandID=$tmpB[0]->id;
                        }
                        $med=new Medicines();
                        $tmp_med = Medicines::orderBy('id', 'desc')->first();
                        if (sizeof($tmp_med) == 0) {
                            $code = 0;
                        } else {
                            $code = $tmp_med->code;
                        }
                        $med->code = sprintf("%'.06d\n", ($code + 1));
                        $med->name=$v['name'];
                        $med->brand_id=$brandID;
                        $med->power=$v['power'];
                        $med->created_at=date('Y-m-d');
                        $s_value = Session::all();
                        $med->added_by='1';//$s_value['reg_id'];
                        $med->save();
                    }else{
                        $duplicateM.=' '.$v['name'].', ';
                    }
                }
                if( strlen($duplicateM)!=0){
                    $duplicateM.=' has already saved';
                }
            }
        }
        return redirect('medicine/show')->with('message',$duplicateM);
    }

    public function status_change($p_id)
    {
        $tmpP = Medicines::where('id', $p_id)->get();
        $st = 1;
        if ($tmpP[0]->status == $st) {
            $st = 0;
        }
        Medicines::where('id', $p_id)->update(['status' => $st]);
        return redirect('medicine/show');
    }

    public function edit($p_id)
    {
        $cat = Brands::where('id', $p_id)->get();
        return response()->json($cat);
    }

    public function edit_post(Request $request)
    {
        $id = $request->input('category_id');
        $name = $request->input('category_name');
        Brands::where('id', $id)->update(['name' => $name]);

        return redirect('brand/show');
    }

}