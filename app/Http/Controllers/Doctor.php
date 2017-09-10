<?php

namespace App\Http\Controllers;

use App\model\Doctors;
use App\model\Return_product_details;
use App\model\Return_product;
use App\model\Purchase_details;
use App\model\Purchases;
use App\model\Sell_details;
use App\model\Sell;
use App\model\View_permission;
use App\model\Clients;
use App\model\Client_acc;
use App\model\Company;
use App\model\Logins;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Request;
use Session;
use DB;
use Mail;
use App\Mail\SupplierDetailsMail;
use App\Mail\CustomerDetailsMail;
use Illuminate\Support\Facades\Redirect;

class Doctor extends Controller
{
    public function show()
    {
        //.......top nav....///
        $value = Session::all();
        $data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $data['company_info'] = Company::all();
        //......ends...............

        $data['doctor_info'] = Doctors::orderBy('id')->get();
        return view('pos.pages.doctor.show', $data);
    }

    public function edit($id)
    {
        //.......top nav....///
        $value = Session::all();
        $data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $data['company_info'] = Company::all();
        //......ends...............

        $data['all_info'] = Doctors::where('id', $id)->get();
        return view('pos.pages.doctor.edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->input('edit_id');
        $p['name'] = $request->input('name');
        $p['address'] = $request->input('address');
        $p['phone'] = $request->input('phone');
        $p['age'] = $request->input('age');
        $p['gender'] = $request->input('gender');
        $p['degree'] = $request->input('degree');

        Doctors::where('id', $id)->update($p);

        return redirect('doctor/show');

    }

    public function details($id)
    {
        //.......top nav....///
        $value = Session::all();
        $data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $data['company_info'] = Company::all();
        //......ends...............

        $data['client_info'] = Clients::with('prescription.doctor')->where('id',$id)->get();
        //dd($data);
        return view('pos.pages.client.details', $data);
    }

}