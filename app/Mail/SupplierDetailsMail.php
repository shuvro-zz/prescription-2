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
use App\model\Return_product_details;
use App\model\Return_product;
use App\model\Purchase_details;
use App\model\Purchases;
use App\model\Sell_details;

class SupplierDetailsMail extends Mailable
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
        $this->inputs = $data['supplier_id'];
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
        $client_id = $this->inputs;
        $startDate = $this->inputss;
        $data['isMail'] =$this->inputs2;
        $data['company_info'] = Company::all();
        $data['selectedMnth'] = $startDate;
        $data['supplier_info'] = Clients::where('id', $client_id)->get();
        $data['supplier_details'] = Purchase_details::with('products.units')->whereIn('pur_id', function ($query) use ($client_id, $startDate) {
            $query->select('id')
                ->from(with(new Purchases)->getTable())
                ->where('client_id', $client_id);
                //->where('purchase_date', 'like', $startDate . '%');
        })->get();
        
        $data['return_details'] = Return_product_details::with('products.units')->whereIn('return_product_id', function ($query) use ($client_id, $startDate) {
            $query->select('id')
                ->from(with(new Return_product)->getTable())
                //->where('client_id', $client_id)
                ->where('created_at', 'like', $startDate . '%');
        })->get();
        $tmpPrdct = $data['supplier_details']->groupBy('p_id');

        $pID = [];
        foreach ($tmpPrdct as $key => $t) {
            $pID[$key] = $t[0]->p_id;
        }

        $data['sell_details'] = Sell_details::whereIn('p_id', $pID)->where('created_at', 'like', $startDate . '%')->get();

        $data['products'] = $pID;


        $supplier_id = $this->inputs;
        $pdf_data['company_info'] = Company::all();

        return $this->from($pdf_data['company_info'][0]->email)
            ->subject('Supplier Product Report')
            ->view('pos.pages.supplier.supplier_details_pdf', $data);
    }
}