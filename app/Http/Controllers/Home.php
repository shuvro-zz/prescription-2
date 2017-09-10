<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Validator;
use App\model\Company;
use App\model\View_permission;
use App\model\Sell;
use App\model\Category;
use App\model\Sub_Category;
use App\model\Client_acc;
use App\model\Unit;
use App\model\Logins;
use App\model\Stocks;
use App\model\Products;
use App\model\Registration;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Request;
use Session;
use mysqli;

class Home extends Controller
{

    public function index()
    {
        $value = Session::all();
        $data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $data['company_info'] = Company::all();

        // echo '<pre>'; print_r($value); print_r($data); die();
        $value = count($data['company_info']);
        if ($value == 0) {
            $data['value'] = 0;
            return view('pos.pages.home.index', $data);
        } else {
            $data['value'] = 1;
            return redirect('home/dashboard');
        }
        return view('pos.pages.home.index', $data);
    }

    public function insert_company(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) {
            return redirect('home/index')
                ->withInput($request->all())
                ->withErrors($validator->errors());
        } else {
            // echo '<pre>';
            // print_r($request->all()); die();
            $com = new Company();
            $com->name = $request->input('name');
            $com->address = $request->input('address');
            $com->contact = $request->input('contact');
            $com->email = $request->input('email');
            $com->website = $request->input('website');
            $com->title = $request->input('title');

            $com->logo = 'no image';

            $com->save();


            $imageName = 'logo' . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

            Company::where('id', $com->id)->update(['logo' => $imageName]);
            return redirect('home/index');
        }
    }

    public function update_profile_info(Request $request)
    {
        $id = $request->input('edit_id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $data = array(
            'name' => $name,
            'phone' => $phone
        );
        Registration::where('id', $id)->update($data);
        return redirect('home/index');
    }

    public function update_password(Request $request)
    {
        $old_password = md5($request->input('old_password'));
        $new_pass = md5($request->input('new_pass'));
        $new_pass_confirm = md5($request->input('new_pass_confirm'));
        $old_pass = $request->input('old_pass');
        $reg_id = $request->input('reg_id');
        if ($old_password == $old_pass) {
            if ($new_pass == $new_pass_confirm) {
                $data = array(
                    'password' => $new_pass
                );

                Logins::where('reg_id', $reg_id)->update($data);
                $message = $request->session()->flash('message', 'PASSWORD Changed Successfully');
                return redirect('home/index');
            } else {
                $message = $request->session()->flash('message', 'NEW PASSWORD do not Matched');
                return redirect('home/index');
            }
        } else {
            $message = $request->session()->flash('message', 'OLD PASSWORD do not Matched');
            return redirect('home/index');
        }
    }


    public function db_backup()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $name = 'prescription';
        $tables = false;
        $backup_name = false;


        $mysqli = new mysqli($host, $user, $pass, $name);
        $mysqli->select_db($name);
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables = $mysqli->query('SHOW TABLES');
        while ($row = $queryTables->fetch_row()) {
            $target_tables[] = $row[0];
        }
        if ($tables !== false) {
            $target_tables = array_intersect($target_tables, $tables);
        }
        foreach ($target_tables as $table) {
            $result = $mysqli->query('SELECT * FROM ' . $table);
            $fields_amount = $result->field_count;
            $rows_num = $mysqli->affected_rows;
            $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
            $TableMLine = $res->fetch_row();
            $content = (!isset($content) ? '' : $content) . "\n\n" . $TableMLine[1] . ";\n\n";
            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
                while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                    if ($st_counter % 100 == 0 || $st_counter == 0) {
                        $content .= "\nINSERT INTO " . $table . " VALUES";
                    }
                    $content .= "\n(";
                    for ($j = 0; $j < $fields_amount; $j++) {
                        $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                        if (isset($row[$j])) {
                            $content .= '"' . $row[$j] . '"';
                        } else {
                            $content .= '""';
                        }
                        if ($j < ($fields_amount - 1)) {
                            $content .= ',';
                        }
                    }
                    $content .= ")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                        $content .= ";";
                    } else {
                        $content .= ",";
                    }
                    $st_counter = $st_counter + 1;
                }
            }
            $content .= "\n\n\n";
        }
        $backup_name = $backup_name ? $backup_name : $name . "___(" . date('H-i-s') . "_" . date('d-m-Y') . ")__rand" . rand(1, 11111111) . ".sql";
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . $backup_name . "\"");
        echo $content;
        exit;

    }

    public function dashboard()
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............

        //return redirect('prescription/show');
        return view('pos.pages.home.dashboard', $page_data);
    }

}