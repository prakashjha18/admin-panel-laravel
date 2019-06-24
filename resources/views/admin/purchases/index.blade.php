@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    
    <h3 class="page-title">PURCHASES of {{$client->client_name}}</h3>
    @can('client_create')
    <p>
        <a href="/admin/clients/{{$client->id}}/purchases/create" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan
<input type="hidden" id="excelid" value="{{$client->client_gstin}}/purchases/">
    @can('client_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.clients.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.clients.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($purchases) > 0 ? 'datatable' : '' }} @can('client_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('client_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>invoice no.</th>
                        <th>company name</th>
                        <th>company address</th>
                        <th>Date</th>
                        <th>product name</th>
                        <th>hsn code</th>
                        <th>rate</th>
                        <th>qty</th>
                        <th>pcs/kgs</th>
                        <th>gst rate</th>
                        <th>total</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>IGST</th>
                        <th>invoice amount</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($purchases) > 0)
                        @foreach ($purchases as $purchase)
                            <tr data-entry-id="{{ $purchase->id }}">
                                @can('client_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='client_name'>{{ $purchase->inv_no }}</td>
                                <td field-key='client_address'>{{ $purchase->company_name }}</td>
                                <td field-key='client_gstin'>{{ $purchase->company_name }}</td>
                                <td field-key='client_emailid'>{{ $purchase->date }}</td>
                                <td field-key='client_mobileno'>{{ $purchase->product_name }}</td>
                                <td field-key='payment_status'>{{ $purchase->hsn_code }}</td>
                                <td field-key='payment_status'>{{ $purchase->rate }}</td>
                                <td field-key='payment_status'>{{ $purchase->qty }}</td>
                                <td field-key='payment_status'>{{ $purchase->pcs_kgs }}</td>
                                <td field-key='payment_status'>{{ $purchase->gst_rate }}</td>
                                <td field-key='payment_status'>{{ $purchase->total }}</td>
                                <td field-key='payment_status'>{{ $purchase->CGST }}</td>
                                <td field-key='payment_status'>{{ $purchase->SGST }}</td>
                                <td field-key='payment_status'>{{ $purchase->IGST }}</td>
                                <td field-key='payment_status'>{{ $purchase->invoice_amount }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('client_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.clients.restore', $purchase->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('client_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.clients.perma_del', $purchase->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('client_view')
                                    <a href="{{ route('admin.purchases.show',[$client->id,$purchase->id]) }}" class="btn btn-xs btn-primary">view</a>
                                    @endcan
                                    @can('client_edit')
                                    <a href="{{ route('admin.purchases.edit',[$client->id,$purchase->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('client_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.purchases.destroy',$client->id, $purchase->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table><button id="button-a">excel</button>
        </div>
        
    </div>
@stop

@section('javascript') 
    <script>
        @can('client_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.clients.mass_destroy') }}'; @endif
        @endcan

    </script>
    
@endsection