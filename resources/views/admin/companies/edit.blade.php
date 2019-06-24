@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.companies.title')</h3>
    
    {!! Form::model($company, ['method' => 'PUT', 'route' => ['admin.companies.update', $company->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company_name', trans('quickadmin.companies.fields.company-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('company_name', old('company_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company_name'))
                        <p class="help-block">
                            {{ $errors->first('company_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company_address', trans('quickadmin.companies.fields.company-address').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('company_address', old('company_address'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company_address'))
                        <p class="help-block">
                            {{ $errors->first('company_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gst_in', trans('quickadmin.companies.fields.gst-in').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('gst_in', old('gst_in'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p id='validgst'></p>
                    <p class="help-block"></p>
                    @if($errors->has('gst_in'))
                        <p class="help-block">
                            {{ $errors->first('gst_in') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company_email', trans('quickadmin.companies.fields.company-email').'', ['class' => 'control-label']) !!}
                    {!! Form::email('company_email', old('company_email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company_email'))
                        <p class="help-block">
                            {{ $errors->first('company_email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company_mobileno', trans('quickadmin.companies.fields.company-mobileno').'', ['class' => 'control-label']) !!}
                    {!! Form::text('company_mobileno', old('company_mobileno'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company_mobileno'))
                        <p class="help-block">
                            {{ $errors->first('company_mobileno') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    <script>
            document.getElementById('gst_in').addEventListener('keyup', validategstin);
            function validategstin() {
            const name = document.getElementById('gst_in');
            const re = /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/;
    
            if((!re.test(name.value))  || (!checksum(name.value))){
                console.log('invalid');
                document.getElementById("gst_in").style.border="1px solid red";
                document.getElementById("validgst").innerHTML="invalid gst";
                document.getElementById("validgst").style.color = "red";
            } else {
                console.log('valid');
                document.getElementById("gst_in").style.border="1px solid green";
                document.getElementById("validgst").innerHTML="";
            }
            
            }
            //checksum(name.value);
            
            function checksum(g) {
                let a=65,b=55,c=36;
                return Array['from'](g).reduce((i,j,k,g)=>{ 
                p=(p=(j.charCodeAt(0)<a?parseInt(j):j.charCodeAt(0)-b)*(k%2+1))>c?1+(p-c):p;
                return k<14?i+p:j==((c=(c-(i%c)))<10?c:String.fromCharCode(c+b));
                },0);     
            }
        </script>
@stop

