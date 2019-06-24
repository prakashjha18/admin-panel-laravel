@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.companies.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.companies.fields.company-name')</th>
                            <td field-key='company_name'>{{ $company->company_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.companies.fields.company-address')</th>
                            <td field-key='company_address'>{!! $company->company_address !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.companies.fields.gst-in')</th>
                            <td field-key='gst_in'>{{ $company->gst_in }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.companies.fields.company-email')</th>
                            <td field-key='company_email'>{{ $company->company_email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.companies.fields.company-mobileno')</th>
                            <td field-key='company_mobileno'>{{ $company->company_mobileno }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.companies.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


