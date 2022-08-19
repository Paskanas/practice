@extends('Layouts.app')


@section('content')
<div class="container mt-4 w-80">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Dishes</h1>
          {{-- <div>
            <a class="btn btn-outline-primary m-2" href="{{route('restorant-index', ['sort'=>'asc'])}}">A_Z</a>
          <a class="btn btn-outline-primary m-2" href="{{route('restorant-index', ['sort'=>'desc'])}}">Z_A</a>
          <a class="btn btn-outline-primary m-2" href="{{route('restorant-index')}}">Reset</a>
        </div> --}}
      </div>

      <div class="card-body">

        <ul class="list-group">
          @forelse($dishes as $dish)
          <li class="list-group-item">
            <div class="row">
              <div class="col-6">
                <h2>{{$dish->title}}</h2>

              </div>
              <div class="col-6">
                @if($dish->photo)
                <div class="w-30 h-30">
                  <img class="rounded" src="{{$dish->photo}}" alt="Dish photo">
                </div>
                @endif

              </div>
            </div>
            {{-- <div class="color-bin"> --}}
            {{-- <div class="color-box"> --}}
            {{-- </div> --}}

            <div class="d-flex justify-start">
              <a class="btn btn-outline-primary m-2" href="{{route('dishes-show', $dish->id)}}">SHOW</a>
              @if(Auth::user()->role >9)
              <a class="btn btn-outline-success m-2" href="{{route('dishes-edit', $dish)}}">EDIT</a>
              <form class="delete m-2" action="{{route('dishes-delete', $dish)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-outline-primary" type="submit">Destroy</button>
              </form>
              @endif
            </div>
            {{-- </div> --}}
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
