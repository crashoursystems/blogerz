@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="/dist/summernote-lite.css">


@section('content')
    <div class="container">
        <form action="{{route('chat.update', $chat->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Название чата</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Название" value="{{$chat->name}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Ссылка на чат</label>
                <input type="text" name="href" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Название" value="{{$chat->href}}">
            </div>

            <img style="width: 35vw !important;" src="/storage/{{$chat->photopp 
                }}" alt="">

            <div class="form-group">
                <input type="file" class="form-control" name="path">
            </div>

            <button type="submit" class="btn btn-success">Обновить</button>
        </form>

    </div>
@endsection

@section('scripts')
    <link href="https://stackpath.bюootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
       $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection


