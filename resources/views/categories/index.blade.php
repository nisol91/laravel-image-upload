@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <td><a href=" {{ route('categories.create') }}" class="btn btn-success">Create</a></td>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          @foreach ($categories as $category)
                            <td>{{ $category->id}}</td>
                            <td>{{ $category->name}}</td>
                            <td>{{ $category->slug}}</td>
                            <td><a href=" {{ route('categories.show', $category->id) }}" class="btn btn-success">Show</a></td>
                            <td><a href=" {{ route('categories.edit', $category->id) }}" class="btn btn-success">Edit</a></td>
                            <td><form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                            </td>
                          @endforeach
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
