@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <a href="http://localhost/shares/create" class="btn btn-primary">Add</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Age</td>
                <td>Phone</td>
                <td>Image</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($shares as $share)
                <tr>
                    <td>{{$share->id}}</td>
                    <td>{{$share->name}}</td>
                    <td>{{$share->age}}</td>
                    <td>{{$share->phone}}</td>
                    <td><img style="width: 30px" src="/../upload/{{$share->avatar}}"></td>
                    <td><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>



            @endforeach
            </tbody>
        </table>
        <div>
@endsection