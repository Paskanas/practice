@extends('layouts.app')

@section('content')
<div class="container mt-4 w-80">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Dishes</h1>
        </div>
        <div class="card-body">
          <ul class="list-group">
            @forelse($dishes as $dish)
            <li class="list-group-item">
              <div class="row">
                <div class="col-6">
                  <label for="restorant">Restorant</label>
                  <h5 name='restorant'>{{$dish->getDishRestorants->title}}</h5>
                  <label for="title">Title</label>
                  <h5 name='title'>{{$dish->title}}</h5>
                  <label for="price">Price</label>
                  <h5 name='price'>{{$dish->price}} &euro;</h5>
                  <label for="rating">Rating</label>
                  <h5 name='rating'>{{$dish->rating}}</h5>
                </div>
                <div class="col-4 d-flex align-items-center justify-center">
                  @if($dish->photo)
                  <div class="w-30 h-30 d-flex justify-end">
                    <img class="rounded" src="{{$dish->photo}}" alt="Dish photo">
                  </div>
                  @endif
                </div>
                <div class="col-2 d-flex align-items-center justify-center">
                  <div class="d-flex flex-col">
                    <a class="btn btn-outline-primary m-2" href="{{route('dishes-show', $dish->id)}}">SHOW</a>
                    @if(Auth::user()->role >9)
                    <a class="btn btn-outline-success m-2" href="{{route('dishes-edit', $dish)}}">EDIT</a>
                    <form class="delete m-2" action="{{route('dishes-delete', $dish)}}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-outline-primary" type="submit">DELETE</button>
                    </form>
                    @endif
                  </div>
                </div>
              </div>
            </li>
            @empty
            <li class="list-group-item">No dishes yet</li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
