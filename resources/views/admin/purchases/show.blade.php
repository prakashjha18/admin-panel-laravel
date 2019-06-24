@extends('layouts.app')

@section('content')
    <h3 class="page-title">client purchases</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            PURCHASES
        </div>
{{-- gstin/sale/month/year --}}
        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>invoice no.</th>
                            <td field-key='company_name'>{{ $purchases->inv_no }}</td>
                        </tr>
                        <tr>
                            <th>company name</th>
                            <td field-key='company_address'>{{ $purchases->company_name }}</td>
                        </tr>
                        <tr>
                            <th>company address</th>
                            <td field-key='gst_in'>{{ $purchases->company_address }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td field-key='company_email'>{{ $purchases->date}}</td>
                        </tr>
                        <tr>
                            <th>product name</th>
                            <td field-key='company_mobileno'>{{ $purchases->product_name }}</td>
                        </tr>
                        <tr>
                            <th>hsn code</th>
                            <td field-key='company_mobileno'>{{ $purchases->hsn_code }}</td>
                        </tr>
                        <tr>
                            <th>qty</th>
                            <td field-key='company_mobileno'>{{ $purchases->qty }}</td>
                        </tr>
                        <tr>
                            <th>rate</th>
                            <td field-key='company_mobileno'>{{ $purchases->rate }}</td>
                        </tr>
                        <tr>
                            <th>pcs/kgs</th>
                            <td field-key='company_mobileno'>{{ $purchases->pcs_kgs }}</td>
                        </tr>
                        <tr>
                            <th>total</th>
                            <td field-key='company_mobileno'>{{ $purchases->total }}</td>
                        </tr>
                        <tr>
                            <th>gst rate</th>
                            <td field-key='company_mobileno'>{{ $purchases->gst_rate }}</td>
                        </tr>
                        <tr>
                            <th>CGST</th>
                            <td field-key='company_mobileno'>{{ $purchases->CGST }}</td>
                        </tr>
                        <tr>
                            <th>SGST</th>
                            <td field-key='company_mobileno'>{{ $purchases->SGST }}</td>
                        </tr>
                        <tr>
                            <th>IGST</th>
                            <td field-key='company_mobileno'>{{ $purchases->IGST }}</td>
                        </tr>
                        <tr>
                            <th>Invoice amount</th>
                            <td field-key='company_mobileno'>{{ $purchases->invoice_amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.purchases.table',$id) }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


