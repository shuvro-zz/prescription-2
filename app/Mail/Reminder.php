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
    class Reminder extends Mailable
    {
        use Queueable, SerializesModels;
        /**
         * Create a new message instance.
         *
         * @return void
         */
        protected $sell_id;
        public function __construct($sell_id)
        {
            $this->inputs = $sell_id;
        }
        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
$sell_id=$this->inputs;
            $pdf_data['payment_cash'] = Payment::where('payment_for', 2)->where('payment_type_id', 2)->where('sp_id',$sell_id )->get();
            $pdf_data['payment_check'] = Payment::with('check_payment.bank_name')->where('payment_for', 2)->where('payment_type_id', 1)->where('sp_id', $sell_id)->get();
//echo '<pre>';echo $sell_id;print_r($pdf_data['payment_cash']);print_r($pdf_data['payment_check']);die();
            $pdf_data['company_info'] = Company::all();
            $pdf_data['invoice_info'] = Sell::with('products_details.product.units')->with('client')->where('id', $sell_id)->get();

            $pdf_data['past_client_acc_info'] = Client_acc::where('sp_id','<',$sell_id)->where('client_id',$client_id)->get();
            $pdf_data['client_acc_info'] = Client_acc::where('client_id',$client_id)->get(); 


               return $this->from($pdf_data['company_info'][0]->email)
                ->subject('বিক্রয়ের সম্পূর্ণ তথ্য')
                ->view('pos.pages.sells.sell_invoice_pdf',$pdf_data);
        }
    }