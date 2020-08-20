@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="/dist/summernote-lite.css">


@section('content')
<div class="container">
    <form action="{{route('market.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Имя инстурмента</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Название">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Cсылка на инструмент инстурмента</label>
            <input type="text" name="href" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Цена">
        </div>ы

        <div class="form-group">
            <label for="exampleInputPassword1">Дополнительная информация к инстурменту</label>
            <textarea class="form-control" id="text" name="content"  cols="30" rows="10"></textarea>
        </div>


        <div class="form-group">
            <input type="file" class="form-control" name="path">
        </div>

        <button type="submit" class="btn btn-success">Создать</button>
    </form>

</div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="/dist/summernote-lite.js"></script>
    <script src="/dist/lang/summernote-ru-RU.js"></script>
    <script>
        $('#text').summernote();
    </script>
@endsection


