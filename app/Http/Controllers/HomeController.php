<?php

namespace App\Http\Controllers;
use App\sales;
use App\Client;
use App\purchases;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index1()
    {
        return redirect('/admin/home'); 
    }
    public function index()
    { 
        return view('home');
    }
    public function monthlist()
    {
        $clientmonthsingle = '00';
        $clientyearsingle = '00';
        $clientnamesingle = 'null';
        $years = sales::select('year')->where('client_id',0)->get();
        $salepurr='null';
        $clientname = Client::select('client_name')->where('id',0)->get();
        $months = purchases::select('month')->where('client_id',0)->where('year',0000)->groupby('month')->get();
        return view('admin.monthlylist.index')->with('years',$years)->with('salepurr',$salepurr)->with('clientnamesingle',$clientnamesingle)->with('clientname',$clientname)->with('clientyearsingle',$clientyearsingle)->with('months',$months)->with('clientmonthsingle',$clientmonthsingle);
    }
    public function salepurr($salepurr)
    {   
        $clientmonthsingle = '00';
        $clientyearsingle = '00';
        $clientnamesingle = 'null';
        $years = sales::select('year')->where('client_id',0)->get();
        if($salepurr == 'sales')
        {
            $clientid = sales::select('client_id')->groupby('client_id')->get();
        }
        else{
            $clientid = purchases::select('client_id')->groupby('client_id')->get();
        }
        //$clientid = $salepurr::select('client_id')->groupby('client_id')->get();
        // return $clientid;
        $clientname = [];
        foreach($clientid as $id){
            
            $clientarr = Client::select('client_name')->where('id',$id->client_id)->first();
            $object=new Client;
            $object->client_name=$clientarr->client_name;
            array_push($clientname,$object);
            
        }
        $months = purchases::select('month')->where('client_id',0)->where('year',0000)->groupby('month')->get();
        return view('admin.monthlylist.index')->with('salepurr',$salepurr)->with('clientname',$clientname)->with('clientnamesingle',$clientnamesingle)->with('years',$years)->with('clientyearsingle',$clientyearsingle)->with('months',$months)->with('clientmonthsingle',$clientmonthsingle);
    }
    public function clientname($salepurr, $clientnamesingle)
    {
        $clientmonthsingle = '00';
        $clientyearsingle = '00';
        if($salepurr == 'sales')
        {
            $clientid = sales::select('client_id')->groupby('client_id')->get();
            $clientname = [];
            foreach($clientid as $id){
                
                $clientarr = Client::select('client_name')->where('id',$id->client_id)->first();
                $object=new Client;
                $object->client_name=$clientarr->client_name;
                array_push($clientname,$object);
                
            }
            $clientid = Client::select('id')->where('client_name',$clientnamesingle)->first();
            $years = sales::select('year')->where('client_id',$clientid->id)->groupby('year')->get();
        }
        else{
            $clientid = purchases::select('client_id')->groupby('client_id')->get();
            $clientname = [];
            foreach($clientid as $id){
                
                $clientarr = Client::select('client_name')->where('id',$id->client_id)->first();
                $object=new Client;
                $object->client_name=$clientarr->client_name;
                array_push($clientname,$object);
                
            }
            $clientid = Client::select('id')->where('client_name',$clientnamesingle)->first();
            $years = purchases::select('year')->where('client_id',$clientid->id)->groupby('year')->get();
        }
        //$clientid = $salepurr::select('client_id')->groupby('client_id')->get();
        // return $clientid;
        $months = purchases::select('month')->where('client_id',0)->where('year',0000)->groupby('month')->get();
        return view('admin.monthlylist.index')->with('salepurr',$salepurr)->with('clientname',$clientname)->with('years',$years)->with('clientnamesingle',$clientnamesingle)->with('clientyearsingle',$clientyearsingle)->with('months',$months)->with('clientmonthsingle',$clientmonthsingle);
    }
    public function clientyear($salepurr, $clientnamesingle, $clientyearsingle)
    {
        $clientmonthsingle = '00';
        if($salepurr == 'sales')
        {
            $clientid = sales::select('client_id')->groupby('client_id')->get();
            $clientname = [];
            foreach($clientid as $id){
                
                $clientarr = Client::select('client_name')->where('id',$id->client_id)->first();
                $object=new Client;
                $object->client_name=$clientarr->client_name;
                array_push($clientname,$object);
                
            }
            $clientid = Client::select('id')->where('client_name',$clientnamesingle)->first();
            $years = sales::select('year')->where('client_id',$clientid->id)->groupby('year')->get();
            $months = sales::select('month')->where('client_id',$clientid->id)->where('year',$clientyearsingle)->groupby('month')->get();
        }
        else{
            $clientid = purchases::select('client_id')->groupby('client_id')->get();
            $clientname = [];
            foreach($clientid as $id){
                
                $clientarr = Client::select('client_name')->where('id',$id->client_id)->first();
                $object=new Client;
                $object->client_name=$clientarr->client_name;
                array_push($clientname,$object);
                
            }
            $clientid = Client::select('id')->where('client_name',$clientnamesingle)->first();
            $years = purchases::select('year')->where('client_id',$clientid->id)->groupby('year')->get();
            $months = purchases::select('month')->where('client_id',$clientid->id)->where('year',$clientyearsingle)->groupby('month')->get();
        }
         
        
        return view('admin.monthlylist.index')->with('salepurr',$salepurr)->with('clientname',$clientname)->with('years',$years)->with('clientnamesingle',$clientnamesingle)->with('clientyearsingle',$clientyearsingle)->with('months',$months)->with('clientmonthsingle',$clientmonthsingle);

    }
    public function clientmonth($salepurr, $clientnamesingle, $clientyearsingle, $clientmonthsingle)
    {

        if($salepurr == 'sales')
        {
            $clientid = sales::select('client_id')->groupby('client_id')->get();
            $clientname = [];
            foreach($clientid as $id){
                
                $clientarr = Client::select('client_name')->where('id',$id->client_id)->first();
                $object=new Client;
                $object->client_name=$clientarr->client_name;
                array_push($clientname,$object);
                
            }
            $clientid = Client::select('id')->where('client_name',$clientnamesingle)->first();
            $years = sales::select('year')->where('client_id',$clientid->id)->groupby('year')->get();
            $months = sales::select('month')->where('client_id',$clientid->id)->where('year',$clientyearsingle)->groupby('month')->get();
            $sales = sales::where('client_id',$clientid->id)->where('month',$clientmonthsingle)->where('year',$clientyearsingle)->get();
        }
        else{
            $clientid = purchases::select('client_id')->groupby('client_id')->get();
            $clientname = [];
            foreach($clientid as $id){
                
                $clientarr = Client::select('client_name')->where('id',$id->client_id)->first();
                $object=new Client;
                $object->client_name=$clientarr->client_name;
                array_push($clientname,$object);
                
            }
            $clientid = Client::select('id')->where('client_name',$clientnamesingle)->first();
            $years = purchases::select('year')->where('client_id',$clientid->id)->groupby('year')->get();
            $months = purchases::select('month')->where('client_id',$clientid->id)->where('year',$clientyearsingle)->groupby('month')->get();
            $sales = purchases::where('client_id',$clientid->id)->where('month',$clientmonthsingle)->where('year',$clientyearsingle)->get();
        }
        $client = Client::find($clientid->id);
        return view('admin.monthlylist.table')->with('salepurr',$salepurr)->with('clientname',$clientname)->with('years',$years)->with('clientnamesingle',$clientnamesingle)->with('clientyearsingle',$clientyearsingle)->with('months',$months)->with('clientmonthsingle',$clientmonthsingle)->with('sales',$sales)->with('client',$client);

    }
    
}
