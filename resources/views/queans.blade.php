@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">My Answer List</div>
                @foreach($queans as $key=>$val)
                    <div class="card-body">
                        <div class="form-group">
                            <b>Q1) {{$val->question1}} </b>   
                            <br/>
                            {{$val->answer1}}
                        </div>
                        <div class="form-group">
                            <b>Q2) {{$val->question2}} </b>   
                            <br/>
                            {{$val->answer2}}
                        </div>
                        <div class="form-group">
                            Submit date : {{ \Carbon\Carbon::parse($val->created_at)->isoFormat('MMM Do YYYY h:m:s')}}
                        </div>
                    </div>
                    <hr/>
                @endforeach   
            </div>
        </div>
    </div>
</div>
@endsection
