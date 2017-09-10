<?php

namespace App\Http\Controllers;

use App\model\Test_lists;
use App\model\TestNote;
use App\model\Company;
use App\model\Logins;
use Symfony\Component\HttpFoundation\Request;
use Session;
use Maatwebsite\Excel\Facades\Excel;

class Test extends Controller
{
    public function test()
    {
        $value = Session::all();
        $data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $data['company_info'] = Company::all();
        //......ends...............
        $data['note_info'] = TestNote::all();
        //dd($data);
        return view('pos.pages.prescription.test',$data);
    }
    public function test_show()
    {
        return view('pos.pages.prescription.test_show');
    }
    public function add_test_post(Request $r)
    {
        //echo '<pre>'; print_r($r->all()); die();
        $title = $r->input('title');
      //  echo '<pre>'; print_r($title); die();
        foreach ($title as $row){
            $p = new TestNote();
            $p->title=$row;
            $p->created_at= date('Y-m-d');
            $p->save();
           // return redirect('/test');
        }
        return redirect('/test');

    }
    public function update_test(Request $r)
    {
        $id = $r->input('id');
        $data['title'] = $r->input('title');
        TestNote::where('id', $id)->update($data);
        return redirect('/test');
    }
    public function delete_test($id)
    {
        $tmpP = TestNote::where('id', $id)->delete();
        return redirect('/test');
    }
}