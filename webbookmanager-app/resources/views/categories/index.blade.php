@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">
                <h1 class="text-center mb-5">Categories</h1>

                @can('categories.create')
                    <div class="d-grid pag-2 mb-3">
                        <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm">New Category</a>
                    </div>
                @endcan


                <div class="row">
                    @foreach ($categories as $category)
                        <div class="card mb-3">
                            <div class="card-body">
                                <!--Add image-->

                                <h3 class="card-title text-center mb-3">
                                    <a href="{{route('categories.show', $category->id)}}" class="link-info text-black">{{$category->name}}</a>
                                </h3>
                                <p class="card text-muted"> {{$category->slug}}</p>
                            </div>

                            @can('categories.destroy')
                            <div class="pag-2 mb-3 float-end">

                                <!--delete button -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="formDelete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-end" role="button">Delete</button>
                                </form>
                            </div>
                            @endcan


                        </div>

                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection
