@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.clients.fields.client-name')</th>
                            <td field-key='client_name'>{{ $client->client_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.client-address')</th>
                            <td field-key='client_address'>{!! $client->client_address !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.client-gstin')</th>
                            <td field-key='client_gstin'>{{ $client->client_gstin }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.client-emailid')</th>
                            <td field-key='client_emailid'>{{ $client->client_emailid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.client-mobileno')</th>
                            <td field-key='client_mobileno'>{{ $client->client_mobileno }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.payment-status')</th>
                            <td field-key='payment_status'>{{ $client->payment_status }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.upload-file')</th>
                            <td field-key='upload_file'>@if($client->upload_file)<a href="{{ asset(env('UPLOAD_PATH').'/' . $client->upload_file) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.start-date')</th>
                            <td field-key='start_date'>{{ $client->start_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clients.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
        
    </div>
    <a href="{{$client->id}}/sales" class="btn btn-success">SALES</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{$client->id}}/purchases" class="btn btn-success">PURCHASES</a>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop
