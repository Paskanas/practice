@extends('Layouts.app')

@section('content')
<div class="container mt-4 w-80">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Restorants</h1>
        </div>
        <div class="card-body">
          <ul class="list-group">
            @forelse($restorants as $restorant)
            <li class="list-group-item">
              <div class="row">
                <div class="col-8">
                  <label for="title">Title:</label>
                  <h3 name='title'>{{$restorant->title}}</h3>
                  <label for="city">City:</label>
                  <h3 name='city'>{{$restorant->city}}</h3>
                  <label for="address">Address:</label>
                  <h3 name='address'>{{$restorant->address}}</h3>
                  <label for="working_time">Working hours:</label>
                  <h3 name='working_time'>{{$restorant->working_time}}</h3>
                </div>
                <div class="col-4 d-flex align-items-center justify-evenly">
                  <div class="d-flex flex-col w-100">
                    <a class="btn btn-outline-primary m-2" href="{{route('restorants-show', $restorant->id)}}">SHOW</a>
                    {{-- not need if different page --}}
                    @if(Auth::user()->role >9)
                    <a class="btn btn-outline-success m-2" href="{{route('restorants-edit', $restorant)}}">EDIT</a>
                    <form class="" action="{{route('restorants-delete', $restorant)}}" method="post">
                      @csrf
                      @method('delete')
                      <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary m-2" type="submit">Destroy</button>
                      </div>
                    </form>
                    @endif
                  </div>
                </div>
              </div>
            </li>
            @empty
            <li class="list-group-item">No restorants yet</li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
