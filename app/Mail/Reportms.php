<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\model\View_permission;
use App\model\Sell;
use App\model\Sell_details;
use App\model\Clients;
use App\model\Stocks;
use App\model\Bank;
use App\model\Company;
use App\model\Logins;
use App\model\Products;
use App\model\Client_acc;
use App\model\Payment;
use App\model\Check_payment;
use Symfony\Component\HttpFoundation\Request;
use DB;
use DateTime;
use Session;
class Reportms extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $month;
    public function __construct($month)
    {
        $this->inputs = $month;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $value=Session::all();
        $data['reg_info']= Logins::with('reg')->where('id',$value['login_id'])->get();
        $data['company_info']= Company::all(); 
        $data['prmssn_info'] = View_permission::where('login_id', $data['reg_info'][0]->id)->get();
$month=$this->inputs;
        $prev_mon = substr($month, 5, 7) - 1;
            $currnt_year = substr($month, 0, 4);
            $prev_month = $currnt_year.'-'.$prev_mon;
            
            $data['get_month_value']  = \App\model\Products::with(['sell_details'=>function($q) use ($month){
             $q->where('created_at','like',''.$month.'%');
             $q->orderBy('created_at');
         }]) ->get();
         $data['get_prev_month']  = \App\model\Products::with(['stock'=>function($q) use($prev_month){
             $q->where('created_at','like',''.$prev_month.'%');
             $q->orderBy('created_at','Desc');
         }]) ->get();
         $data['get_sell_details']  = \App\model\Products::with(['purchase_details'=>function($q) use($month){
             $q->where('created_at','like',''.$month.'%');
             $q->orderBy('created_at','Desc');
         }]) ->get();
         $data['get_input_date'] = $month;
        
        return $this->from($data['company_info'][0]->email)
                ->subject($month.'-মাসের বিক্রয়ের সম্পূর্ণ তথ্য')
            ->view('pos.pages.reports.monthly_sell_pdf',$data);
    }
}