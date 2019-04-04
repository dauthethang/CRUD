@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Share
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('shares.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="price">Age :</label>
                    <input type="text" class="form-control" name="age"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Phone :</label>
                    <input type="text" class="form-control" name="phone"/>
                </div>
                <div class="custom-file">
                        {{ csrf_field() }}
                        <input type="file" name="avatar" required="true">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

        </div>

    </div>


@section('jsCustom')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            console.log(111);
            var fileName = $(this).val().split("\\").pop();
            console.log(fileName);
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection