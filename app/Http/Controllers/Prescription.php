<?php

namespace App\Http\Controllers;

use App\model\Brands;
use App\model\Doctors;
use App\model\Known_case_lists;
use App\model\Medicine_lists;
use App\model\Medicines;
use App\model\Note_lists;
use App\model\Test_lists;
use App\model\Prescriptions;
use App\model\View_permission;
use App\model\Bank;
use App\model\Check_payment;
use App\model\Client_acc;
use App\model\Clients;
use App\model\Purchase_details;
use App\model\Purchases;
use App\model\Stocks;
use App\model\Company;
use App\model\Logins;
use App\model\Payment;
use Illuminate\Support\Facades\Validator;
use App\model\Category;
use App\model\Sub_Category;
use App\model\Unit;
use App\model\TestNote;
use App\model\Note;
use App\model\Products;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Request;
use Session;


class Prescription extends Controller
{
    public function show()
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............

        $page_data['prescription'] = Prescriptions::with('client')->where('status', 1)->orderBy('id', 'desc')->get();
        //dd($page_data);
        return view('pos.pages.prescription.show', $page_data);
    }

    public function add()
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............

        $page_data['medicine'] = Medicines::where('status', 1)->get();
        $page_data['client'] = Clients::where('status', 1)->get();
        $page_data['doctor'] = Doctors::where('status', 1)->get();

        $page_data['known_case'] = Note::get();
        $page_data['note_info'] = TestNote::all();

        return view('pos.pages.prescription.add', $page_data);
    }

    public function post(Request $r)
    {
        // echo '<pre>'; print_r($_POST); die();

        ////  new prescription///////
        $p = new Prescriptions();
        $tmp_pres = Prescriptions::orderBy('id', 'desc')->first();
        if (sizeof($tmp_pres) == 0) {
            $code = 0;
        } else {
            $code = $tmp_pres->code;
        }
        $p->code = sprintf("%'.06d\n", ($code + 1));
        $p->doctor_id = $r->input('doctor_id');
        $p->client_id = $r->input('client_id');
        $p->created_at = date('Y-m-d');
        $p->save();

        $p_id = $p->id;

        $notes = $r->input('note');
        foreach ($notes as $n) {
            $note = new Note_lists();
            $note->prescription_id = $p_id;
            $note->details = $n;
            $note->created_at = date('Y-m-d');
            $note->save();
        }

        $medicine_id = $r->input('medicine_id');
        $duration = $r->input('duration');
        $medicine_time = $r->input('medicine_time');
        $comment = $r->input('comment');

        $tmp_before_meal = $r->input('before_meal');
        $before_meal = array();
        $k = 0;
        foreach ($tmp_before_meal as $t) {
            $before_meal[$k++] = $t;
        }


        foreach ($medicine_id as $kk => $m) {
            $mdcnLst = new Medicine_lists();
            $mdcnLst->prescription_id = $p_id;
            $mdcnLst->medicine_id = $m;
            $mdcnLst->before_meal = $before_meal[$kk];
            $mdcnLst->comment = $comment[$kk];
            $mdcnLst->duration = $duration[$kk];
            $mdcnLst->medicine_taken = $medicine_time[$kk];
            $mdcnLst->created_at = date('Y-m-d');
            $mdcnLst->save();
        }

        $known_case_details = $r->input('known_case');
        foreach ($known_case_details as $k => $row) {
            $kwn_case = new Known_case_lists();
            $kwn_case->prescription_id = $p_id;
            $kwn_case->known_case_id = $known_case_details[$k];
            $kwn_case->created_at = $known_case_details[$k];

            $kwn_case->save();
        }
        $test_details = $r->input('note_info');
        foreach ($test_details as $k => $row) {
            $test_case = new Test_lists();
            $test_case->prescription_id = $p_id;
            $test_case->test_id = $row;
            $test_case->created_at = $test_details[$k];
            $test_case->save();
        }
//        prescriptionPdf($p_id);
        return redirect('prescription/pdf/'.$p_id);
    }

    public function details($id)
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        // $page_data['note_info'] = TestNote::all();

        //......ends...............
        $page_data['prescription'] = Prescriptions::with('client')
            ->with('known_case_list.hasknownCase')
            ->with('Test_lists.hasTest')
            ->with('doctor')
            ->with('medicini_list.medicine')
            ->with('note_list')
            ->where('id', $id)->get();

        //dd($page_data);
        return view('pos.pages.prescription.details', $page_data);
    }

    public function prescriptionPdf($id)
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............

        $page_data['prescription'] = Prescriptions::with('client')->with('known_case_list.hasknownCase')->with('Test_lists.hasTest')->with('doctor')->with('medicini_list.medicine')->with('note_list')->where('id', $id)->get();


        $mpdf = new \mPDF('bn', 'A4', '', '', 0, 0, 0, 0, 0, 0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $html = view('pos.pages.prescription.details_pdf', $page_data);
        $html1 = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

        $mpdf->WriteHTML($html1);
        $orderPdfName = "order-" . $singleOrder[0]['display_name'];
        $mpdf->Output("report.pdf", 'I');
        header('Content-type: application/pdf');
        header("Content-Disposition: attachment; filename=test.pdf");
    }

    public function edit_data($id)
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        //......ends...............
        $page_data['known_case'] = Note::get();
        $page_data['prescription'] = Prescriptions::with('client')->with('known_case_list.hasknownCase')->with('doctor')->with('medicini_list.medicine')->with('note_list')->where('id', $id)->get();
        //$page_data['prescription'] = Prescriptions::with('client')->with('note')->with('doctor')->with('medicini_list.medicine')->with('note_list')->where('id', $id)->get();
        //dd($page_data);
        $page_data['medicine'] = Medicines::where('status', 1)->get();
        return view('pos.pages.prescription.edit', $page_data);
    }

    public function update_data(Request $u)
    {
//        echo '<pre>';
//        print_r($u->all());
//        die();
        $p_id = $u->input('pres_id');

        ////////////////////////////////////////
        ////////////NOTE LIST///////////////////
        ///////////////////////////////////////

        ///////////prev note list update/////////////
        $t_dtls_id = $u->input('details_id');
        $t_dtls = $u->input('details');

        foreach ($t_dtls_id as $k => $note) {
            $pNotes['details'] = $t_dtls[$k];
            Note_lists::where('id', $t_dtls_id[$k])->update($pNotes);
        }

        ////////////////New note list Add////////////////
        if (!empty($u->input('note'))) {
            $new_note = $u->input('note');
            foreach ($new_note as $n) {
                $note = new Note_lists();
                $note->prescription_id = $p_id;
                $note->details = $n;
                $note->created_at = date('Y-m-d');
                $note->save();
            }
        }


        ////////////////////////////////////////
        ////////////medicine list///////////////////
        ///////////////////////////////////////

        ////////////prev medicine list update////////////
        $p_medicine_list_id = $u->input('p_mdcn_lst_id');
        $p_medicine_id = $u->input('p_medicine_id');
        $p_duration = $u->input('p_duration');
        $p_medicine_time = $u->input('p_medicine_time');
        $p_comment = $u->input('p_comment');

        $p_tmp_before_meal = $u->input('p_before_meal');
        $p_before_meal = array();
        $k = 0;
        foreach ($p_tmp_before_meal as $t) {
            $p_before_meal[$k++] = $t;
        }

        foreach ($p_medicine_list_id as $kk => $m) {
            $pmdcnLst['medicine_id'] = $p_medicine_id[$kk];
            $pmdcnLst['before_meal'] = $p_before_meal[$kk];
            $pmdcnLst['comment'] = $p_comment[$kk];
            $pmdcnLst['duration'] = $p_duration[$kk];
            $pmdcnLst['medicine_taken'] = $p_medicine_time[$kk];

            Medicine_lists::where('id', $p_medicine_list_id[$kk])->update($pmdcnLst);
        }

        if (!empty($u->input('medicine_id'))) {
            /////////new medicine list add///////////////
            $medicine_id = $u->input('medicine_id');
            $duration = $u->input('duration');
            $medicine_time = $u->input('medicine_time');
            $comment = $u->input('comment');

            $tmp_before_meal = $u->input('before_meal');
            $before_meal = array();
            $k = 0;
            foreach ($tmp_before_meal as $t) {
                $before_meal[$k++] = $t;
            }

            foreach ($medicine_id as $kk => $m) {
                $mdcnLst = new Medicine_lists();
                $mdcnLst->prescription_id = $p_id;
                $mdcnLst->medicine_id = $m;
                $mdcnLst->before_meal = $before_meal[$kk];
                $mdcnLst->comment = $comment[$kk];
                $mdcnLst->duration = $duration[$kk];
                $mdcnLst->medicine_taken = $medicine_time[$kk];
                $mdcnLst->created_at = date('Y-m-d');
                $mdcnLst->save();
            }
        }

        ////////////////////////////////////////
        ////////////known case list/////////////
        ///////////////////////////////////////
        Known_case_lists::where('prescription_id', $p_id)->delete();
        $known_case_details = $u->input('known_case');
        foreach ($known_case_details as $k => $row) {
            $kwn_case = new Known_case_lists();
            $kwn_case->prescription_id = $p_id;
            $kwn_case->known_case_id = $known_case_details[$k];
            $kwn_case->created_at = $known_case_details[$k];
            $kwn_case->save();
        }

        return redirect('prescription/show');
    }


    public function get_product()
    {
        $products = Products::where('status', 1)->get();
        return response()->json($products);
    }

    public function get_product_unit(Request $request)
    {
        $p_id = $request->input('p_id');
        $products = Products::where('id', $p_id)->get();
        $data['unit'] = Unit::where('id', $products[0]->unit_id)->get();
        $data['price'] = $products[0]->buy_price;
        return response()->json($data);
    }

    public function view_detail($id)
    {
        //.......top nav....///
        $value = Session::all();
        $page_data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $page_data['company_info'] = Company::all();
        $page_data['prmssn_info'] = View_permission::where('login_id', $page_data['reg_info'][0]->id)->get();
        //......ends...............

        $page_data['purchase_info'] = Purchases::with('client')->where('id', $id)->get();
        $page_data['purchase_detail_info'] = Purchase_details::with('product.units')->where('pur_id', $id)->get();
        $page_data['payment'] = Payment::with('check_payment.bank_name')->where('sp_id', $id)->where('payment_for', 1)->get();
        $page_data['clientAcc'] = Client_Acc::where('client_id', $page_data['purchase_info'][0]->client_id)->where('sp_id', '<', $id)->get();
        //echo '<pre>';print_r($page_data['clientAcc']);die();
        return view('pos.pages.purchase.purchase_detail', $page_data);
    }


    /*-----------------------------------------------------
     * -----------------Known Case Start------------------*
     * -------------------------------------------------- */

    public function known_case()
    {
        //.......top nav....///
        $value = Session::all();
        $data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $data['company_info'] = Company::all();
        //......ends...............
        $data['note_info'] = Note:: all();
        return view('pos.pages.prescription.knowncase_show', $data);
    }

    public function known_case_add()
    {
        //.......top nav....///
        $value = Session::all();
        $data['reg_info'] = Logins::with('reg')->where('id', $value['login_id'])->get();
        $data['company_info'] = Company::all();
        //......ends...............
        $data['note_info'] = Note:: all();
        return view('pos.pages.prescription.knowncase_add', $data);
    }

    public function add_known_case_post(Request $r)
    {
        $data['title'] = $r->input('title');
        $data['detail'] = $r->input('detail');
        Note::insert($data);
        return redirect('prescription/known_case');
    }

    public function update_known_case(Request $r)
    {
        $id = $r->input('id');
        $data['title'] = $r->input('title');
        $data['detail'] = $r->input('detail');
        Note::where('id', $id)->update($data);
        return redirect('prescription/known_case');
    }

    public function delete_known_case($id)
    {
        $tmpP = Note::where('id', $id)->delete();
        return redirect('prescription/known_case');
    }

    /*-----------------------------------------------------
     * -----------------Known Case Ends ------------------*
     * ---------------------------------------------------*/


    public function edit_post(Request $r)
    {
//        echo '<pre>';
//        print_r($r->all());
//
//        die();
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');

        // print_r(str_replace($bn_digits,$en_digits,'১২০৬৫৭৪464৫৭৬৪৫৬')); die();
        $p_id = $r->input('pur_id');
//        echo $p_id;die();
        $PrevPayment = Payment::with('check_payment.bank_name')->where('sp_id', $p_id)->where('payment_for', 1)->get();
        $purchase_detail_info = Purchase_details::where('pur_id', $p_id)->get();
        ////  purchase update///////
        $purchase['purchase_date'] = str_replace($bn_digits, $en_digits, $r->input('p_date'));
        $purchase['reference'] = $r->input('ref');
        $purchase['client_id'] = $r->input('client_id');

        Purchases::where('id', $p_id)->update($purchase);

        $p_details_id = $r->input('p_details_id');
        $description = $r->input('description');
        $unit_id = $r->input('unit_id');
        $price = $r->input('price');
        $quantity = $r->input('quantity');

        //........payment.........
        $payment_type = $r->input('payment_type');
        foreach ($payment_type as $payType) {
            if ($payType == 2) {
                $update = false;
                $pay_id = 0;
                foreach ($PrevPayment as $prv) {
                    if ($prv->payment_type_id == 2) {
                        $update = true;
                        $pay_id = $prv->id;
                    }
                }
                if ($update == true) {
                    $payment['cash_amount'] = str_replace($bn_digits, $en_digits, $r->input('cash_amnt'));
                    Payment::where('id', $pay_id)->update($payment);
                } else {
                    $payment = new Payment();
                    $payment->payment_type_id = $payType;
                    $payment->sp_id = $p_id;
                    $payment->payment_for = 1;
                    $payment->cash_amount = str_replace($bn_digits, $en_digits, $r->input('cash_amnt'));
                    $payment->created_at = date('Y-m-d');
                    $payment->save();
                }

            } else if ($payType == 1) {
                $update = false;
                $pay_id = 0;
                foreach ($PrevPayment as $prv) {
                    if ($prv->payment_type_id == 1) {
                        $update = true;
                        $pay_id = $prv->check_payment[0]->id;
                    }
                }
                if ($update == true) {
                    $check_payment['bank_id'] = $r->input('bank_id');
                    $check_payment['check_no'] = str_replace($bn_digits, $en_digits, $r->input('check_no'));
                    $check_payment['issue_date'] = str_replace($bn_digits, $en_digits, $r->input('issue_date'));
                    $check_payment['amount'] = str_replace($bn_digits, $en_digits, $r->input('check_amnt'));

                    Check_payment::where('id', $pay_id)->update($check_payment);
                } else {
                    $payment = new Payment();
                    $payment->payment_type_id = $payType;
                    $payment->sp_id = $p_id;
                    $payment->payment_for = 1;
                    $payment->cash_amount = 0;
                    $payment->created_at = date('Y-m-d');
                    //echo '<pre>';
                    /// print_r($payment);
                    $payment->save();
                    $check_payment = new Check_payment();
                    $check_payment->payment_id = $payment->id;
                    $check_payment->bank_id = $r->input('bank_id');
                    $check_payment->check_no = $r->input('check_no');
                    $check_payment->issue_date = $r->input('issue_date');
                    $check_payment->amount = str_replace($bn_digits, $en_digits, $r->input('check_amnt'));
                    $check_payment->created_at = date('Y-m-d');
                    //print_r($check_payment); die();
                    $check_payment->save();
                }

            }
        }

        //// client info insert.....

        $clntAcc['client_id'] = $r->input('client_id');
        $clntAcc['credit'] = $r->input('pay_amount');
        $clntAcc['debit'] = $r->input('netTotal');

        Client_acc::where('id', $r->input('client_acc_id'))->update($clntAcc);

        foreach ($r->input('p_id') as $key => $pur) {
            if ($pur != 0) {

                /////  stock amnount check.......
                $tmp_stck = Stocks::where('p_id', $pur)->orderBy('id', 'desc')->get();

                if (sizeof($tmp_stck) == 0) {
                    $crr_p = 0;
                } else {
                    $crr_p = $tmp_stck[0]->stock_in_hand;
                }
                $pin = 0;
                $pout = 0;
                $nQTY = 0;
                $sType = 1;
                $add_stock = true;
                foreach ($purchase_detail_info as $pd) {
                    if ($pd->p_id == $pur) {
                        $nQTY = $pd->quantity - $quantity[$key];
                        if ($nQTY == 0) {
                            $add_stock = false;
                        } elseif ($nQTY < 0) {
                            $pin = -1 * $nQTY;
                            $pout = 0;
                            $sType = 7;
                        } elseif ($nQTY > 0) {
                            $pout = $nQTY;
                            $pin = 0;
                            $sType = 7;
                        }
                    }
                }
                if ($add_stock == true) {
                    ////......stock insert......
                    $stock = new Stocks();
                    $stock->p_id = $pur;
                    $stock->type = $sType;
                    $stock->details_id = $p_id;
                    $stock->stock_date = str_replace($bn_digits, $en_digits, $r->input('p_date'));
                    $stock->stock_in = str_replace($bn_digits, $en_digits, $pin);
                    $stock->stock_out = str_replace($bn_digits, $en_digits, $pout);
                    $stock->stock_in_hand = $crr_p + $stock->stock_in - $stock->stock_out;
                    $stock->created_at = date('Y-m-d');

//                    echo 'in='.$pin;
//                    echo 'out='.$pout;
//                    echo 'stock in hand='.$crr_p; die();
                    $stock->save();
                }


                ///.....get product info......
                $product = Products::where('id', $pur)->get();
                ///.....product update.......
                $pre_price = $product[0]->buy_price * $crr_p;
                $crr_price = str_replace($bn_digits, $en_digits, $price[$key]) * str_replace($bn_digits, $en_digits, $quantity[$key]);
                $new_price = ($pre_price + $crr_price) / ($crr_p + str_replace($bn_digits, $en_digits, $quantity[$key]));
                $new_price = number_format($new_price, 2, '.', '');
                Products::where('id', $pur)->update(['buy_price' => $new_price]);

                if ($key < sizeof($p_details_id)) {
                    ///purchase details update////////
                    $purchase_details['pur_id'] = $p_id;
                    $purchase_details['p_id'] = $pur;
                    $purchase_details['u_id'] = $product[0]->unit_id;
                    $purchase_details['buy_price'] = str_replace($bn_digits, $en_digits, $price[$key]);
                    $purchase_details['quantity'] = str_replace($bn_digits, $en_digits, $quantity[$key]);
                    $purchase_details['description'] = $description[$key];

                    Purchase_details::where('id', $p_details_id[$key])->update($purchase_details);
                } else {

                    $purchase_details = new Purchase_details();

                    $purchase_details->pur_id = $p_id;
                    $purchase_details->p_id = $pur;
                    $purchase_details->u_id = $product[0]->unit_id;
                    $purchase_details->buy_price = str_replace($bn_digits, $en_digits, $price[$key]);
                    $purchase_details->quantity = str_replace($bn_digits, $en_digits, $quantity[$key]);
                    $purchase_details->description = $description[$key];
                    $purchase_details->created_at = date('Y-m-d');

                    $purchase_details->save();
                }
            }
        }

        return redirect('purchase/show');


    }

}