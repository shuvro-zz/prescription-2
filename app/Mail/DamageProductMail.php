<?php

namespace App\Mail;

use App\model\Damage_product_details;
use App\model\Damage_products;
use App\model\Damage_stocks;
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
use App\model\Purchase_details;
use App\model\Purchases;
use App\model\Sell_details;

class DamageProductMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $sell_id;

    public function __construct($data)
    {
        $this->inputss = $data['strtDate'];
        $this->inputs2 = $data['isMail'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $startDate = $this->inputss;
        $data['isMail'] =$this->inputs2;
        $data['company_info'] = Company::all();


        $tmpMnth = $startDate;
        if ($tmpMnth == 'curr') {
            $data['reportType']=$tmpMnth;
            $data['damage_stock'] = Damage_stocks::with('client')->with('product.units')->where('created_at', date('Y-m-d'))->orderBy('id', 'asc')->get();
        } else {
            $data['reportType']=$tmpMnth;
            $data['damage_stock'] = Damage_stocks::with('client')->with('product.units')->where('created_at', 'like', $tmpMnth . '%')->orderBy('id', 'asc')->get();
        }


        $pdf_data['company_info'] = Company::all();

        return $this->from($pdf_data['company_info'][0]->email)
            ->subject('ড্যামেজ প্রোডাক্ট এর প্রতিবেদন')
            ->view('pos.pages.damage_product.damage_product_pdf', $data);
    }
}