@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>
    
    {!! Form::model($client, ['method' => 'PUT', 'route' => ['admin.clients.update', $client->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('client_name', trans('quickadmin.clients.fields.client-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('client_name', old('client_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('client_name'))
                        <p class="help-block">
                            {{ $errors->first('client_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('client_address', trans('quickadmin.clients.fields.client-address').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('client_address', old('client_address'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('client_address'))
                        <p class="help-block">
                            {{ $errors->first('client_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('client_gstin', trans('quickadmin.clients.fields.client-gstin').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('client_gstin', old('client_gstin'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    <p id='validgst'></p>
                    @if($errors->has('client_gstin'))
                        <p class="help-block">
                            {{ $errors->first('client_gstin') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('client_emailid', trans('quickadmin.clients.fields.client-emailid').'', ['class' => 'control-label']) !!}
                    {!! Form::email('client_emailid', old('client_emailid'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('client_emailid'))
                        <p class="help-block">
                            {{ $errors->first('client_emailid') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('client_mobileno', trans('quickadmin.clients.fields.client-mobileno').'', ['class' => 'control-label']) !!}
                    {!! Form::text('client_mobileno', old('client_mobileno'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('client_mobileno'))
                        <p class="help-block">
                            {{ $errors->first('client_mobileno') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('payment_status', trans('quickadmin.clients.fields.payment-status').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('payment_status', old('payment_status'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('payment_status'))
                        <p class="help-block">
                            {{ $errors->first('payment_status') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('upload_file', trans('quickadmin.clients.fields.upload-file').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('upload_file', old('upload_file')) !!}
                    @if ($client->upload_file)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $client->upload_file) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('upload_file', ['class' => 'form-control']) !!}
                    {!! Form::hidden('upload_file_max_size', 2) !!}
                    <p class="help-block"></p>
                    @if($errors->has('upload_file'))
                        <p class="help-block">
                            {{ $errors->first('upload_file') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start_date', trans('quickadmin.clients.fields.start-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('start_date', old('start_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_date'))
                        <p class="help-block">
                            {{ $errors->first('start_date') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
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
        document.getElementById('client_gstin').addEventListener('keyup', validategstin);
        function validategstin() {
        const name = document.getElementById('client_gstin');
        const re = /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/;

        if((!re.test(name.value))  || (!checksum(name.value))){
            console.log('invalid');
            document.getElementById("client_gstin").style.border="1px solid red";
            document.getElementById("validgst").innerHTML="invalid gst";
            document.getElementById("validgst").style.color = "red";
        } else {
            console.log('valid');
            document.getElementById("client_gstin").style.border="1px solid green";
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