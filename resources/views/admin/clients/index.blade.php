@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>
    @can('client_create')
    <p>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

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
            <table class="table table-bordered table-striped ajaxTable @can('client_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('client_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.clients.fields.client-name')</th>
                        <th>@lang('quickadmin.clients.fields.client-address')</th>
                        <th>@lang('quickadmin.clients.fields.client-gstin')</th>
                        <th>@lang('quickadmin.clients.fields.client-emailid')</th>
                        <th>@lang('quickadmin.clients.fields.client-mobileno')</th>
                        <th>@lang('quickadmin.clients.fields.payment-status')</th>
                        <th>@lang('quickadmin.clients.fields.upload-file')</th>
                        <th>@lang('quickadmin.clients.fields.start-date')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('client_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.clients.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.clients.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('client_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'client_name', name: 'client_name'},
                {data: 'client_address', name: 'client_address'},
                {data: 'client_gstin', name: 'client_gstin'},
                {data: 'client_emailid', name: 'client_emailid'},
                {data: 'client_mobileno', name: 'client_mobileno'},
                {data: 'payment_status', name: 'payment_status'},
                {data: 'upload_file', name: 'upload_file'},
                {data: 'start_date', name: 'start_date'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection