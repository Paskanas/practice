@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>New dish</h1>
        </div>
        <div class="card-body">
          <ul>
            <form action="{{route('dishes-store')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="restorant_id">Restorant</label>
                <select class="form-select" name="restorant_id">
                  @foreach($restorants as $restorant)
                  <option value="{{$restorant->id}}">{{$restorant->title}}</option>
                  @endforeach
                </select>
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{old('color_title')}}">
                <label for="price">Price</label>
                <input class="form-control" type="text" name="price" value="{{old('color_title')}}">
                <label for="dish_photo">Photo</label>
                <input class="form-control" type="file" name="dish_photo" value="{{old('color_title')}}">
              </div>
              @csrf
              <button class="btn btn-outline-primary mt-4" type="submit">New restorant</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
