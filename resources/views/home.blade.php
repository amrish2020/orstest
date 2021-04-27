@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session('success'))
        <div class="col-md-8 alert-success p-2">
            <span>{{session('success')}}</span>
        </div>   
        <br/>
        @endif 
        <div class="col-md-8">
        <form method="POST" action="/addqueans" name="addqueans">
                @csrf
                @foreach($queans as $key=>$val)
                <div class="card">
                    <div class="card-header">{{$val->number}}) {{$val->label}}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" value="{{$val->label}}" name="question{{ $loop->iteration }}"/>
                            @if($val->type == 'text')
                                <input type="text" class="form-control" name="answer{{ $loop->iteration }}" value=""/>
                            @endif                   
                        
                            @if($val->type == 'radio')
                                @foreach($val->responses as $key=>$ans)
                                    <input type="radio" name="answer1" value="{{$ans}}"/>{{$ans}}
                                @endforeach
                            @endif 
                        </div>
                    </div>
                    
                </div>
                @endforeach
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="submit">
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection
