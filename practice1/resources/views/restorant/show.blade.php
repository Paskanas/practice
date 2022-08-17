@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        {{-- my comment --}}
        <div class="card-header" {{--style="background: {{$color->color}}"--}}>
          <label for="title">Title</label>
          <h4 name='title' class="nice">{{$restorant->title}}</h4>
          <label for="city">City</label>
          <h4 name='city' class="nice">{{$restorant->city}}</h4>
          <label for="address">Address</label>
          <h4 name='address' class="nice">{{$restorant->address}}</h4>
          <label for="working_time">Working time</label>
          <h4 name='working_time' class="nice">{{$restorant->working_time}}</h4>
        </div>

        <div class="card-body">
          <div class="color-bin">
            <div class="controls">
              <a class="btn btn-outline-success m-2" href="{{route('restorants-edit', $restorant)}}">EDIT</a>
              <form class="delete" action="{{route('restorants-delete', $restorant)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-outline-primary m-2" type="submit">Destroy</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
