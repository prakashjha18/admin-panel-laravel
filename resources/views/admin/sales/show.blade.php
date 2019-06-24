@extends('layouts.app')

@section('content')
    <h3 class="page-title">client sales</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            SALES
        </div>
{{-- gstin/sale/month/year --}}
        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>invoice no.</th>
                            <td field-key='company_name'>{{ $sales->inv_no }}</td>
                        </tr>
                        <tr>
                            <th>company name</th>
                            <td field-key='company_address'>{{ $sales->company_name }}</td>
                        </tr>
                        <tr>
                            <th>company address</th>
                            <td field-key='gst_in'>{{ $sales->company_address }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td field-key='company_email'>{{ $sales->date}}</td>
                        </tr>
                        <tr>
                            <th>product name</th>
                            <td field-key='company_mobileno'>{{ $sales->product_name }}</td>
                        </tr>
                        <tr>
                            <th>hsn code</th>
                            <td field-key='company_mobileno'>{{ $sales->hsn_code }}</td>
                        </tr>
                        <tr>
                            <th>qty</th>
                            <td field-key='company_mobileno'>{{ $sales->qty }}</td>
                        </tr>
                        <tr>
                            <th>rate</th>
                            <td field-key='company_mobileno'>{{ $sales->rate }}</td>
                        </tr>
                        <tr>
                            <th>pcs/kgs</th>
                            <td field-key='company_mobileno'>{{ $sales->pcs_kgs }}</td>
                        </tr>
                        <tr>
                            <th>total</th>
                            <td field-key='company_mobileno'>{{ $sales->total }}</td>
                        </tr>
                        <tr>
                            <th>gst rate</th>
                            <td field-key='company_mobileno'>{{ $sales->gst_rate }}</td>
                        </tr>
                        <tr>
                            <th>CGST</th>
                            <td field-key='company_mobileno'>{{ $sales->CGST }}</td>
                        </tr>
                        <tr>
                            <th>SGST</th>
                            <td field-key='company_mobileno'>{{ $sales->SGST }}</td>
                        </tr>
                        <tr>
                            <th>IGST</th>
                            <td field-key='company_mobileno'>{{ $sales->IGST }}</td>
                        </tr>
                        <tr>
                            <th>Invoice amount</th>
                            <td field-key='company_mobileno'>{{ $sales->invoice_amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.sales.table',$id) }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


