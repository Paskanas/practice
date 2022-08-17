@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Edit color</h1>
        </div>

        <div class="card-body">
          <ul>
            <form action="{{route('colors-update', $color)}}" method="post">
              {{-- <div class="form-group">
                <label>Pavadinimas</label>
                <input type="text" class="form-control">
                <small class="form-text text-muted">Kažkoks parašymas.</small>
              </div> --}}
              <div class="form-group">
                <label for="create_color_input">Color</label>
                <input class="form-control" type="color" name="create_color_input" value="{{old('create_color_input',$color->color)}}">
                <label for="color_title">Color title</label>
                <input class="form-control" type="text" name="color_title" value="{{old('color_title',$color->title)}}">
              </div>
              @csrf
              @method('put')
              <button class="btn btn-outline-primary mt-4" type="submit">New color</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
