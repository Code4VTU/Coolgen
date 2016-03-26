@extends('app')

@section('content')

<div style="text-align: center;">
    <h2>Резултати от Twitter({{count($results)}} резултата):</h2>
   @foreach($results AS $result)
       <br/><br/>
       <strong><a href="https://twitter.com/{{$result->user->screen_name}}" target="_blank">{{$result->user->screen_name}}</a>:</strong> {{$result->text}}
       <hr>
    @endforeach
</div>
    <br />
    <br />
@stop