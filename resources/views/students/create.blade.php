@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{url('student/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">age</label>
            <input type="number" name="age" class="form-control" value="{{ old('age') }}">
            @error('age')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="IDno">Track</label>
            <select class="form-control" id="IDno" name="IDno">
                @foreach($tracks as $track)
                    <option value="{{$track->id}}">{{ $track->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary my-2">Add Student</button>
    </form>
</div>


@endsection
