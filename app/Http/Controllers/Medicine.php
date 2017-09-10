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

class Medicine extends Controller
{
    public function show()
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............

        $page_data['medicine'] = Medicines::with('brand')->get();
        //echo '<pre>';
        //print_r($page_data); die();
        return view('pos.pages.medicine.show', $page_data);
    }

    public function getExcel(Request $request)
    {
        //dd($req->all());

        if ($request->hasFile('file')) {

            $path = $request->file('file')->getRealPath();

            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                $duplicateM = '';
                foreach ($data->toArray() as $key => $v) {
                    //$insert[] = ['name' => $v['name'], 'brand_id' => $v['brand'], 'power' => $v['power'],'created_at'=>date('Y-m-d')];
                    $tmpM = Medicines::where('name', $v['name'])->get();
                    if (sizeof($tmpM) == 0) {
                        $brandID = 0;
                        $tmpB = Brands::where('name', $v['brand'])->get();
                        if (sizeof($tmpB) == 0) {
                            $brnd = new Brands();
                            $brnd->name = $v['brand'];
                            $brnd->created_at = date('Y-m-d');
                            $brnd->save();
                            $brandID = $brnd->id;
                        } else {
                            $brandID = $tmpB[0]->id;
                        }
                        $med = new Medicines();
                        $tmp_med = Medicines::orderBy('id', 'desc')->first();
                        if (sizeof($tmp_med) == 0) {
                            $code = 0;
                        } else {
                            $code = $tmp_med->code;
                        }
                        $med->code = sprintf("%'.06d\n", ($code + 1));
                        $med->name = $v['name'];
                        $med->brand_id = $brandID;
                        $med->power = $v['power'];
                        $med->created_at = date('Y-m-d');
                        $s_value = Session::all();
                        $med->added_by = '1';//$s_value['reg_id'];
                        $med->save();
                    } else {
                        $duplicateM .= ' ' . $v['name'] . ', ';
                    }
                }
                if (strlen($duplicateM) != 0) {
                    $duplicateM .= ' has already saved';
                }
            }
        }
        return redirect('medicine/show')->with('message', $duplicateM);
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
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............

        $page_data['medicine_info'] = Medicines::where('id', $p_id)->get();
        $page_data['brand'] = Brands::all();
        return view('pos.pages.medicine.edit', $page_data);
    }

    public function edit_post(Request $request)
    {
        $p_id = $request->input('p_id');
        $tmp_img = $request->input('img_add');
        if ($tmp_img == 0) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'unit_id' => 'required|numeric| min:1',
                'power' => 'required'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'unit_id' => 'required|numeric| min:1',
                'power' => 'required',
                'image' => 'required|image|mimes:JPEG,PNG,JPG,GIF,jpeg,png,jpg,gif,svg|max:1024'
            ]);
        }

        if ($validator->fails()) {
            return redirect('medicine/edit/' . $p_id)
                ->withInput($request->all())
                ->withErrors($validator->errors());
        } else {
            $p['name'] = $request->input('name');
            $p['brand_id'] = $request->input('unit_id');
            $p['power'] = $request->input('power');

            Medicines::where('id', $p_id)->update($p);

            if ($tmp_img == 1) {
                $imageName = 'p_' . $p_id . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

                Medicines::where('id', $p_id)->update(['image' => $imageName]);
            }

            return redirect('medicine/show');
        }
    }

    public function get_medicine()
    {
        $medicine = Medicines::where('status', 1)->get();
        return response()->json($medicine);
    }


    //////product add..................
    public function add()
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............

        $page_data['brand'] = Brands::all();
        return view('pos.pages.medicine.add', $page_data);
    }

    public function add_post(Request $request)
    {
        $tmp_img = $request->input('img_add');
        if ($tmp_img == 0) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'unit_id' => 'required|numeric| min:1',
                'power' => 'required'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'unit_id' => 'required|numeric| min:1',
                'power' => 'required',
                'image' => 'required|image|mimes:JPEG,PNG,JPG,GIF,jpeg,png,jpg,gif,svg|max:1024'
            ]);
        }

        if ($validator->fails()) {
            return redirect('medicine/add/')
                ->withInput($request->all())
                ->withErrors($validator->errors());
        } else {
            $med = new Medicines();
            $tmp_med = Medicines::orderBy('id', 'desc')->first();
            if (sizeof($tmp_med) == 0) {
                $code = 0;
            } else {
                $code = $tmp_med->code;
            }
            $med->code = sprintf("%'.06d\n", ($code + 1));
            $med->name = $request->input('name');
            $med->brand_id = $request->input('unit_id');
            $med->power = $request->input('power');
            $med->created_at = date('Y-m-d');
            //$s_value = Session::all();
            $med->added_by =1; //$s_value['reg_id'];
            $med->save();

            if ($tmp_img == 1) {
                $imageName = 'p_' . $med->id . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

                Medicines::where('id', $med->id)->update(['image' => $imageName]);
            }

            return redirect('medicine/show');
        }
    }


    //.........get_product..........
    public function get_product($id)
    {
        $products = Products::with('units')->with('category')->with('sub_category')->where('id', $id)->get();
        return response()->json($products);
    }

    ////.........remove..........
    public function remove($id)
    {
        $tmpP = Products::where('id', $id)->delete();
        return redirect('products/show');
    }

    ///.....add_unit/.....///
    public function add_unit(Request $request)
    {
        $u = new Unit();
        $u->name = $request->input('name');
        $u->save();

        //$category=Category::where('status',1)->get();
        return 1;
    }

    ///.........get unit...........
    public function get_unit(Request $request)
    {
        $unit = Unit::where('status', 1)->get();
        return response()->json($unit);
    }

}