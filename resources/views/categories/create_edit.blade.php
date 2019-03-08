@extends('layouts.app')


@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 contenitore">
                <h1>{{$h1}}</h1>
                <form class="form-group" action="{{ $action }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{(!empty($category)) ? $category->name : null}}" placeholder="Inserisci nome">
                    </div>
                    <div class="form-group">
                        <label for="image_file">Image</label>
                    <input type="file" name="image_file" class="form-control" placeholder="Inserisci immagine">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Save new element">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
