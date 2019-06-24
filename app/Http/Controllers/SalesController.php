<?php

namespace App\Http\Controllers;
use App\Client;
use App\Sales;
use App\Company;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index($id)
    {
        $client = Client::find($id);
        //return $client->sales;
        return view('admin.sales.index')->with('sales',$client->sales)->with('client',$client);
    }
    public function create($id)
    {   
        $companyname = Company::pluck('company_name');
        $client = Client::find($id);
        $companys = Company::all();
        // echo"<pre>";
        // print_r($companys);
        //return $companys;
        return view('admin.sales.create')->with('companyname',$companyname)->with('client',$client)->with('companys',$companys);
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
        $sales = new Sales;
        $sales->inv_no = $request->inv_no;
        $sales->client_id = $id;
        $sales->month = $monthname;
        $sales->year = $yearname;
        $sales->company_name =$cname;
        $sales->company_address = $cadd;
        $sales->date = $request->date;
        $sales->product_name = $request->product_name;
        $sales->hsn_code = $request->hsn_code;
        $sales->qty = $request->qty;
        $sales->rate = $request->rate;
        $sales->pcs_kgs = $request->pcs_kgs;
        $sales->total = $request->total;
        $sales->gst_rate = $request->gst_rate;
        $sales->CGST = $request->CGST;
        $sales->SGST = $request->SGST;
        $sales->IGST = $request->IGST;
        $sales->invoice_amount = $request->invoice_amount;
        $sales->save();
        return redirect()->route('admin.sales.table',$id);
    }
    public function show($id,$iid)
    {
        $sales = Sales::find($iid);
        return view('admin.sales.show')->with('sales',$sales)->with('id',$id);
    }
    public function edit($id,$iid)
    {
        $sales = Sales::find($iid);
        $client = Client::find($id);
        $companys = Company::all();
        $saless = Sales::all();
        return view('admin.sales.edit')->with('sales',$sales)->with('id',$id)->with('client',$client)->with('companys',$companys)->with('saless',$saless);
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
        $sales = Sales::find($iid);
        $sales->inv_no = $request->inv_no;
        $sales->client_id = $id;
        $sales->month = $monthname;
        $sales->year = $yearname;
        $sales->company_name =$cname;
        $sales->company_address = $cadd;
        $sales->date = $request->date;
        $sales->product_name = $request->product_name;
        $sales->hsn_code = $request->hsn_code;
        $sales->qty = $request->qty;
        $sales->rate = $request->rate;
        $sales->pcs_kgs = $request->pcs_kgs;
        $sales->total = $request->total;
        $sales->gst_rate = $request->gst_rate;
        $sales->CGST = $request->CGST;
        $sales->SGST = $request->SGST;
        $sales->IGST = $request->IGST;
        $sales->invoice_amount = $request->invoice_amount;
        $sales->save();
        return redirect()->route('admin.sales.table',$id);
    }
    public function destroy($id,$iid)
    {
        $sale = Sales::find($iid);
        $sale->delete();
        return redirect()->route('admin.sales.table',$id);
    }
}
