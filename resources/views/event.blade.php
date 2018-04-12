@extends('Layout.master')
@section('css')
<style>
    .card:hover{
        box-shadow: 5px 5px 3px grey;
    }
</style>
@endsection
@section('header')
@endsection
@section('content')
<div class="container  text-center">
  <br>
  <h2>Daily Events</h2>
  <p>Event yang diadakan Santren Koding</p>
  <div class="row">
            @foreach($event as $events)
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card" >
                    <img class="card-img-top" width="100px" height="200px" src="{{URL::asset('../uploads/'.$events->foto)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$events->nama}}</h5>
                        <p class="card-text">{{$events->keterangan}}</p>
                        <a href="users/{{$events->id}}/detailevent" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div><br>
@endsection
@section('js')
@endsection
