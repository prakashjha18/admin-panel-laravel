@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <select name="team" class="form-control" id="salepurr" onchange="state(this.value)">
                <option value="0" disabled="true" selected="true" >-Sales or Purchase-</option>
                {{-- @foreach($names as $name)
                
                <option class="option"  ></option>
 
                @endforeach --}}
                <option value="sales" {{  $salepurr=='sales' ? 'selected=="selected"' : '' }}>sales</option>
                <option value="purchases" {{  $salepurr=='purchases' ? 'selected=="selected"' : '' }}>purchases</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="team" class="form-control" id="clientname" >
                <option value="0" disabled="true" selected="true" >-Select Client-</option>
                @foreach($clientname as $client)
                
                <option class="option"  value="{{ $client->client_name }}" {{  $clientnamesingle==$client->client_name ? 'selected=="selected"' : '' }}>{{  $client->client_name }}</option>
                
                @endforeach
                
            </select>
        </div>
        <div class="col-md-3">
            <select name="team" class="form-control" id="year" >
                <option value="0" disabled="true" selected="true" >-Select Year-</option>
                @foreach($years as $year)
                
                <option class="option"  value="{{ $year->year }}" {{  $clientyearsingle==$year->year ? 'selected=="selected"' : '' }}>{{ $year->year }}</option>
                
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="team" class="form-control" id="month">
                <option value="0" disabled="true" selected="true" >-Select Month-</option>
                @foreach($months as $month)
                
                <option class="option"  value="{{ $month->month }}" {{  $clientyearsingle==$month->month ? 'selected=="selected"' : '' }}>{{ $month->month }}</option>
                
                @endforeach
            </select>
        </div>
    </div><br><br>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('#salepurr').change((ev)=>{
        window.location.href = `/admin/monthlylistings/${$('#salepurr').val()}`
    })
    $('#clientname').change((ev)=>{
        window.location.href = `/admin/monthlylistings/${$('#salepurr').val()}/${$('#clientname').val()}`
    })
    $('#year').change((ev)=>{
        window.location.href = `/admin/monthlylistings/${$('#salepurr').val()}/${$('#clientname').val()}/${$('#year').val()}`
    })
    $('#month').change((ev)=>{
        window.location.href = `/admin/monthlylistings/${$('#salepurr').val()}/${$('#clientname').val()}/${$('#year').val()}/${$('#month').val()}`
    })
    $('#name').val('<%= selectedBank %>');
    $('#state').val('<%= selectedState %>');
    $('#district').val('<%= selectedDistrict %>');
    $('#branch').val('<%= selectedBranch %>');
</script>
@endsection