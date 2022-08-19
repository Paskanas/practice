@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" style="background: {{$dish->dish}}" ;>
          <h1 class="nice">{{$dish->title}}</h1>
        </div>

        <div class="card-body">
          {{-- <div class="color-bin"> --}}
          <div class="row">
            <div class="col-6">
              <label for="restorant">Restorant</label>
              <h5 name='restorant'>{{$dish->getDishRestorants->title}}</h5>
              <label for="restorant">Title</label>
              <h5 name='restorant'>{{$dish->title}}</h5>
              <label for="restorant">Price</label>
              <h5 name='restorant'>{{$dish->price}} &euro;</h5>

            </div>
            <div class="col-6">
              @if($dish->photo)
              <div class="w-30 h-30 d-flex align-content-center justify-center">
                <img class="rounded" src="{{$dish->photo}}" alt="Dish photo">
              </div>
              @endif
            </div>
          </div>
          @if(Auth::user()->role>9)
          <div class="controls">
            <a class="btn btn-outline-success m-2" href="{{route('dishess-edit', $dish)}}">EDIT</a>
            <form class="delete" action="{{route('dishes-delete', $dish)}}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-outline-primary m-2" type="submit">Destroy</button>
            </form>
          </div>
          {{-- </div> --}}
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
