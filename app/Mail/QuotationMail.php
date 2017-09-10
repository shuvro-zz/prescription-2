<?php

    namespace App\Mail;
    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Contracts\Queue\ShouldQueue;
use App\model\View_permission;
use App\model\Quotation;
use App\model\Quotation_details;
use App\model\Clients;
use App\model\Stocks;
use App\model\Company;
use App\model\Logins;
use App\model\Products;
use App\model\Client_acc;

    class QuotationMail extends Mailable
    {
        use Queueable, SerializesModels;
        /**
         * Create a new message instance.
         *
         * @return void
         */
        protected $sell_id;
        public function __construct($quotation_id)
        {
            $this->inputs = $quotation_id;
        }
        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
          $quotation_id=$this->inputs;
          
          $pdf_data['company_info'] = Company::all();
          $pdf_data['quotation_info'] = Quotation::with('products_details.product.units')->with('client')->where('id', $quotation_id)->get();

               return $this->from($pdf_data['company_info'][0]->email)
                ->subject('কোটেশন')
                ->view('pos.pages.quotation.quotation_pdf',$pdf_data);
        }
    }