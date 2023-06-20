@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="text-end">
        <a class="btn btn-primary" href="{{('student/create')}}">Add Student</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">track</th>
            <th scope="col">Edit</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->track->name}}</td>
                <td>
                    @can('update' , $student)
                        <a href="{{url('student/edit',$student->id)}}">edit</a>
                    @endcan
                </td>
                <td>
                    @can('delete' , $student)
                        <a href="{{url('student/delete',$student->id)}}">delete</a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
