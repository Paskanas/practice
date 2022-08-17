@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" style="background: {{$color->color}}" ;>
          <h1 class="nice">{{$color->title}}</h1>
        </div>

        <div class="card-body">
          <div class="color-bin">
            <div class="controls">
              <a class="btn btn-outline-success m-2" href="{{route('colors-edit', $color)}}">EDIT</a>
              <form class="delete" action="{{route('colors-delete', $color)}}" method="post">
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
