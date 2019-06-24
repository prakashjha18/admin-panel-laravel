<?php

namespace App\Http\Controllers;
use App\Client;
use App\Sales;
use App\purchases;
use App\Company;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index($id)
    {
        $client = Client::find($id);
        //return $client->sales;
        return view('admin.purchases.index')->with('purchases',$client->purchases)->with('client',$client);
    }
    public function create($id)
    {   
        $companyname = Company::pluck('company_name');
        $client = Client::find($id);
        $companys = Company::all();
        // echo"<pre>";
        // print_r($companys);
        //return $companys;
        return view('admin.purchases.create')->with('companyname',$companyname)->with('client',$client)->with('companys',$companys);
    }
    public function store($id,Request $request)
    {
        //return $request->all();
        //return 
        $month = $request->date[3].$request->date[4];
        $monthname;
        if($month == '01'){ $monthname = 'jan'; }
        else if($month == '02'){ $monthname = 'feb'; }
        else if($month == '03'){ $monthname = 'mar'; }
        else if($month == '04'){ $monthname = 'apr'; }
        else if($month == '05'){ $monthname = 'may'; }
        else if($month == '06'){ $monthname = 'jun'; }
        else if($month == '07'){ $monthname = 'jul'; }
        else if($month == '08'){ $monthname = 'aug'; }
        else if($month == '09'){ $monthname = 'sep'; }
        else if($month == '10'){ $monthname = 'oct'; }
        else if($month == '11'){ $monthname = 'nov'; }
        else if($month == '12'){ $monthname = 'dec'; }
        else{ $monthname = 'invalid';}
        $yearname = $request->date[6].$request->date[7].$request->date[8].$request->date[9];
        
        $this->validate($request, [
            'inv_no' => 'required',
            'company_name' => 'required',
            
            'product_name' => 'required',
            'hsn_code' => 'required',
            'rate' => 'required',
            'qty' => 'required',
            'gst_rate' => 'required',
            
         ]);
        $company = Company::where('gst_in',$request->company_name)->get()->first();
        $cname=  $company->company_name;
        $cadd = $company->company_address;
        $purchases = new purchases ;
        $purchases->inv_no = $request->inv_no;
        $purchases->client_id = $id;
        $purchases->month = $monthname;
        $purchases->year = $yearname;
        $purchases->company_name =$cname;
        $purchases->company_address = $cadd;
        $purchases->date = $request->date;
        $purchases->product_name = $request->product_name;
        $purchases->hsn_code = $request->hsn_code;
        $purchases->qty = $request->qty;
        $purchases->rate = $request->rate;
        $purchases->pcs_kgs = $request->pcs_kgs;
        $purchases->total = $request->total;
        $purchases->gst_rate = $request->gst_rate;
        $purchases->CGST = $request->CGST;
        $purchases->SGST = $request->SGST;
        $purchases->IGST = $request->IGST;
        $purchases->invoice_amount = $request->invoice_amount;
        $purchases->save();
        return redirect()->route('admin.purchases.table',$id);
    }
    public function show($id,$iid)
    {
        $purchases = purchases::find($iid);
        return view('admin.purchases.show')->with('purchases',$purchases)->with('id',$id);
    }
    public function edit($id,$iid)
    {
        $purchases = purchases::find($iid);
        $client = Client::find($id);
        $companys = Company::all();
        $purchasess = purchases::all();
        return view('admin.purchases.edit')->with('purchases',$purchases)->with('id',$id)->with('client',$client)->with('companys',$companys)->with('purchasess',$purchasess);
    }
    public function update($id,$iid,Request $request)
    {
        //return $request->all();
        $month = $request->date[3].$request->date[4];
        $monthname;
        if($month == '01'){ $monthname = 'jan'; }
        else if($month == '02'){ $monthname = 'feb'; }
        else if($month == '03'){ $monthname = 'mar'; }
        else if($month == '04'){ $monthname = 'apr'; }
        else if($month == '05'){ $monthname = 'may'; }
        else if($month == '06'){ $monthname = 'jun'; }
        else if($month == '07'){ $monthname = 'jul'; }
        else if($month == '08'){ $monthname = 'aug'; }
        else if($month == '09'){ $monthname = 'sep'; }
        else if($month == '10'){ $monthname = 'oct'; }
        else if($month == '11'){ $monthname = 'nov'; }
        else if($month == '12'){ $monthname = 'dec'; }
        else{ $monthname = 'invalid';}
        $yearname = $request->date[6].$request->date[7].$request->date[8].$request->date[9];
        $this->validate($request, [
            'inv_no' => 'required',
            'company_name' => 'required',
            
            'product_name' => 'required',
            'hsn_code' => 'required',
            'rate' => 'required',
            'qty' => 'required',
            'gst_rate' => 'required',
            
         ]);
        $company = Company::where('gst_in',$request->company_name)->get()->first();
        $cname=  $company->company_name;
        $cadd = $company->company_address;
        $purchases = purchases::find($iid);
        $purchases->inv_no = $request->inv_no;
        $purchases->client_id = $id;
        $purchases->month = $monthname;
        $purchases->year = $yearname;
        $purchases->company_name =$cname;
        $purchases->company_address = $cadd;
        $purchases->date = $request->date;
        $purchases->product_name = $request->product_name;
        $purchases->hsn_code = $request->hsn_code;
        $purchases->qty = $request->qty;
        $purchases->rate = $request->rate;
        $purchases->pcs_kgs = $request->pcs_kgs;
        $purchases->total = $request->total;
        $purchases->gst_rate = $request->gst_rate;
        $purchases->CGST = $request->CGST;
        $purchases->SGST = $request->SGST;
        $purchases->IGST = $request->IGST;
        $purchases->invoice_amount = $request->invoice_amount;
        $purchases->save();
        return redirect()->route('admin.purchases.table',$id);
    }
    public function destroy($id,$iid)
    {
        $purchase = purchases::find($iid);
        $purchase->delete();
        return redirect()->route('admin.purchases.table',$id);
    }
}
