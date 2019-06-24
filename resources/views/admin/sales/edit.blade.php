@extends('layouts.app')

@section('content')
    <h3 class="page-title">SAlES{{$client->client_gstin}}</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.sales.update',$client->id,$sales->id], 'files' => true,]) !!}


    <div class="panel panel-default">
        <div class="panel-heading">
            EDIT
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('inv_no','invoice no.'.'*', ['class' => 'control-label']) !!}
                    {!! Form::text('inv_no', $sales->inv_no, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('inv_no'))
                        <p class="help-block">
                            {{ $errors->first('inv_no') }}
                        </p>
                    @endif
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company_name','company_name'.'*', ['class' => 'control-label']) !!}
                    
                    {!!Form::select('company_name',$companyname,'',['class' => 'form-control','placeholder' => 'Please Select'])!!}
                    <p class="help-block"></p>
                    @if($errors->has('inv_no'))
                        <p class="help-block">
                            {{ $errors->first('inv_no') }}
                        </p>
                    @endif
                </div>
            </div> --}}
            <div class="row">
                <div class="col-xs-12 form-group">  
                    {!! Form::label('company_name','company_name'.'*', ['class' => 'control-label']) !!}
                    <select name="company_name" id="company_name" class="form-control" >
                            <option value="0" disabled="true" selected="true" >-please select-</option>
                        
                        @foreach($companys as $city)
                        <option  value='{{ $city->gst_in }}' {{  $sales->company_name==$city->company_name ? 'selected=="selected"' : '' }}>{{ $city->company_name }}</option>
                        @endforeach
                    </select> 
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', 'date'.'', ['class' => 'control-label']) !!}
                    {!! Form::text('date',$sales->date, ['class' => 'form-control date', 'placeholder' => 'DD/MM/YYYY','required','pattern' => '^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$']) !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('product_name','product_name'.'*', ['class' => 'control-label']) !!}
                    {!! Form::text('product_name', $sales->product_name, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('product_name'))
                        <p class="help-block">
                            {{ $errors->first('product_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('hsn_code','hsn_code'.'*', ['class' => 'control-label']) !!}
                    {!! Form::text('hsn_code', $sales->hsn_code, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('hsn_code'))
                        <p class="help-block">
                            {{ $errors->first('hsn_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rate', 'rate'.'*', ['class' => 'control-label']) !!}
                    {!! Form::number('rate', $sales->rate, ['step'=>'any','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rate'))
                        <p class="help-block">
                            {{ $errors->first('rate') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('qty', 'qty'.'*', ['class' => 'control-label']) !!}
                    {!! Form::number('qty', $sales->qty, ['step'=>'any','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('qty'))
                        <p class="help-block">
                            {{ $errors->first('qty') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pcs_kgs','pcs_kgs'.'*', ['class' => 'control-label']) !!}
                    <select name="pcs_kgs" id="pcs_kgs" class="form-control" >
                        <option value="0" disabled="true" selected="true" >-please select-</option>
                    
                    
                    <option value="pcs" {{  $sales->pcs_kgs=='pcs' ? 'selected=="selected"' : '' }}>pcs</option>
                    <option value="kgs" {{  $sales->pcs_kgs=='kgs' ? 'selected=="selected"' : '' }}>kgs</option>
                    <
                    
                </select>
                    <p class="help-block"></p>
                    @if($errors->has('pcs_kgs'))
                        <p class="help-block">
                            {{ $errors->first('pcs_kgs') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gst_rate','gst_rate'.'*', ['class' => 'control-label']) !!}
                    {{-- {!! Form::text('inv_no', old('inv_no'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!} --}}
                    {{-- {!!Form::select('gst_rate',[ 0,1,2.5,6,5,12,18,28,40],$sales->gst_rate==$city->gst_rate ? 'selected=="selected"' : '',['class' => 'form-control','placeholder' => 'Please Select'])!!} --}}
                    <select name="gst_rate" id="gst_rate" class="form-control" >
                        <option value="0" disabled="true" selected="true" >-please select-</option>
                    
                    
                    <option value='0' {{  $sales->gst_rate=='0' ? 'selected=="selected"' : '' }}>0</option>
                    <option value='1' {{  $sales->gst_rate=='1' ? 'selected=="selected"' : '' }}>1</option>
                    <option value='2.5' {{  $sales->gst_rate=='2.5' ? 'selected=="selected"' : '' }}>2.5</option>
                    <option value='6' {{  $sales->gst_rate=='6' ? 'selected=="selected"' : '' }}>6</option>
                    <option value='5' {{  $sales->gst_rate=='5' ? 'selected=="selected"' : '' }}>5</option>
                    <option value='12' {{  $sales->gst_rate=='12' ? 'selected=="selected"' : '' }}>12</option>
                    <option value='18' {{  $sales->gst_rate=='18' ? 'selected=="selected"' : '' }}>18</option>
                    <option value='28' {{  $sales->gst_rate=='28' ? 'selected=="selected"' : '' }}>28</option>
                    <option value='40' {{  $sales->gst_rate=='40' ? 'selected=="selected"' : '' }}>40</option>
                    
                </select> 
                    <p class="help-block"></p>
                    @if($errors->has('inv_no'))
                        <p class="help-block">
                            {{ $errors->first('inv_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total', 'total', ['class' => 'control-label']) !!}
                    {!! Form::number('total', $sales->total, ['class' => 'form-control', 'placeholder' => '', 'readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total'))
                        <p class="help-block">
                            {{ $errors->first('total') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('CGST', 'CGST', ['class' => 'control-label']) !!}
                    {!! Form::number('CGST', $sales->CGST, ['class' => 'form-control', 'placeholder' => '', 'readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('CGST'))
                        <p class="help-block">
                            {{ $errors->first('CGST') }}
                        </p>
                    @endif
                </div>
            </div>
           
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('SGST', 'SGST', ['class' => 'control-label']) !!}
                    {!! Form::number('SGST', $sales->SGST, ['class' => 'form-control', 'placeholder' => '', 'readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('SGST'))
                        <p class="help-block">
                            {{ $errors->first('SGST') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('IGST', 'IGST', ['class' => 'control-label']) !!}
                    {!! Form::number('IGST', $sales->IGST, ['class' => 'form-control', 'placeholder' => '', 'readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('IGST'))
                        <p class="help-block">
                            {{ $errors->first('IGST') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('invoice_amount', 'invoice_amount', ['class' => 'control-label']) !!}
                    {!! Form::number('invoice_amount', $sales->invoice_amount, ['class' => 'form-control', 'placeholder' => '', 'readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('invoice_amount'))
                        <p class="help-block">
                            {{ $errors->first('invoice_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
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
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
    $(function () {
      $("#qty, #rate").keyup(function () {
        $("#total").val(+$("#qty").val() * +$("#rate").val());
        // var total = document.getElementById("total").value;
        //     console.log(total);
        //     var clientlast = clientgstin[13] + clientgstin[14];
        //     var companylast = companygstin[13] + companygstin[14];
        //     if(clientlast == companylast){
        //         console.log('they same');
        //         var gstrate = $("#gst_rate :selected").text();
        //         gstrate = parseFloat(gstrate);
        //         console.log(gstrate);
        //         var cgst = ((gstrate/2)*total)/100;
        //         var sgst = ((gstrate/2)*total)/100;
        //         console.log(cgst);
        //     }
        //     else{
        //         console.log('they diffrent');
        //         var gstrate = $("#gst_rate :selected").text();
        //         gstrate = parseFloat(gstrate);
        //         console.log(gstrate);
        //         var igst = ((gstrate)*total)/100;
        //         console.log(igst);
        //     }
      });
    });
    // var conceptName = $('#companyname').find(":selected").text();
    // console.log(conceptName);
    // var companyname='abc';
    $(function () {
      $("#company_name").change(function () {
        //console.log($("#companyname").val);
        var companyname = $("#company_name :selected").text();
        var companygstin = $("#company_name").val();
        console.log(companyname);
        console.log(companygstin);
        var clientgstin = "{{$client->client_gstin}}";
        console.log(clientgstin);
        var clientlast = clientgstin[13] + clientgstin[14];
        var companylast = companygstin[13] + companygstin[14];
        console.log(clientlast);
        console.log(companylast);
            $(function () {
                $("#gst_rate").click(function () {
                    var total = document.getElementById("total").value;
                    console.log(total);
                    console.log('dcjd');
                    if(clientlast == companylast){
                        console.log('they same');
                        var gstrate = $("#gst_rate :selected").text();
                        gstrate = parseFloat(gstrate);
                        console.log(gstrate);
                        var cgst = ((gstrate/2)*total)/100;
                        var sgst = ((gstrate/2)*total)/100;
                        console.log(cgst);
                        $("#CGST").val(cgst);
                        $("#SGST").val(sgst);
                        $("#IGST").val(0);
                    }
                    else{
                        console.log('they diffrent');
                        var gstrate = $("#gst_rate :selected").text();
                        gstrate = parseFloat(gstrate);
                        console.log(gstrate);
                        var igst = ((gstrate)*total)/100;
                        console.log(igst);
                        $("#IGST").val(igst);
                        $("#CGST").val(0);
                        $("#SGST").val(0);
                    }
                });
            });
            
      });
    });
    $(function () {
        $("#gst_rate").click(function () {
            var total = document.getElementById("total").value;
            var clientgstin = "{{$client->client_gstin}}";
            console.log(total);
            var companygstin = $("#company_name").val();
            var clientlast = clientgstin[13] + clientgstin[14];
        var companylast = companygstin[13] + companygstin[14];
            if(clientlast == companylast){
                console.log('they same');
                var gstrate = $("#gst_rate :selected").text();
                gstrate = parseFloat(gstrate);
                console.log(gstrate);
                var cgst = ((gstrate/2)*total)/100;
                var sgst = ((gstrate/2)*total)/100;
                console.log(cgst);
                $("#CGST").val(cgst);
                $("#SGST").val(sgst);
                $("#IGST").val(0);
                var invamt = parseFloat(total) + parseFloat(cgst) + parseFloat(sgst);
                $("#invoice_amount").val(invamt);
            }
            else{
                console.log('they diffrent');
                var gstrate = $("#gst_rate :selected").text();
                gstrate = parseFloat(gstrate);
                console.log(gstrate);
                var igst = ((gstrate)*total)/100;
                console.log(igst);
                $("#IGST").val(igst);
                $("#CGST").val(0);
                $("#SGST").val(0);
                var invamt = parseFloat(total) + parseFloat(igst);
                $("#invoice_amount").val(invamt);
            }
        });
    });

    
    </script>
    
@stop