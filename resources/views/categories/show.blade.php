@extends('layouts.app')


@section('content')
    Questa pagina visualizza la categoria: {{$category->name}}
<img src="{{ asset('storage/' . $category->image) }}" alt="">
@endsection
