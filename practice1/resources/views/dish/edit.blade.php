@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Edit dish</h1>
        </div>

        <div class="card-body">
          <ul>
            <form action="{{route('dishes-update', $dish)}}" method="post" enctype="multipart/form-data">
              <label for="restorant_id">Restorant</label>
              <select class="form-select" name="restorant_id">
                @foreach($restorants as $restorant)
                <option value="{{$restorant->id}}" @if($restorant->id === $dish->restorant_id) selected @endif>{{$restorant->title}}</option>
                @endforeach
              </select>
              <label for="title">Title</label>
              <input class="form-control" type="text" name="title" value="{{$dish->title}}">
              <label for="price">Price</label>
              <input class="form-control" type="text" name="price" value="{{$dish->price}}">
              <label for="dish_photo">Photo</label>
              <input class="form-control" type="file" name="dish_photo" value="{{$dish->photo}}">
              @if($dish->photo)
              <div class="image-box w-25 h-25">
                <img class="rounded mt-2" src="{{$dish->photo}}" alt="Dish photo">
              </div>
              @endif

        </div>
        @csrf
        <button class="btn btn-outline-primary mt-4" type="submit">Save</button>
        @method('put')
        </form>
        @if($dish->photo)
        <form action="{{route('dishes-delete-picture',$dish)}}" method="post">
          @csrf
          @method('delete')
          <button class="btn btn-outline-danger m-2" type="submit">Delete photo</button>
        </form>
        @endif
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
