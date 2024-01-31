@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">
                <h1 class="text-center text-muted mb-5">{{$category->name}}</h1>
                <div class="row">
                    @foreach ($booksByCategory as $book)
                    <div class="col-md-8-mx-auto">

                        <div class="card mb-3">
                            <div class="card-body">

                                <img src="/images/{{ $book->image_path }}" class="card-img-top mx-auto" style="height: 250px; width: 200px;display: block;" alt="{{ $book->image_path }}">

                                <h3 class="text-center mb-5">{{$book->name}}</h3>
                                <p class="card text-muted"> {{$book->description}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Author: {{$book->author}}</li>
                                <li class="list-group-item"> {{$book->category->name}}</li>
                                <li class="list-group-item"><h5><span class="badge bg-primary">${{$book->price}}</span></h5></li>
                            </ul>
                        </div>

                        @can('books.destroy')
                        <div class="pag-2 mb-3 float-end">

                            <!--delete button -->
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="formDelete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" role="button">Delete</button>
                            </form>
                        </div>
                        @endcan
                        @can('books.edit')
                        <div class="pag-2 mb-3 float-end">
                            <!--edit button -->
                            <a href="{{ route('books.edit', $book->id)}}" class="btn btn-info" role="button">Edit</a>
                        </div>
                        @endcan

                        <div class="pag-2 mb-3">
                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                @method('POST')
                                <input type="hidden" value="{{ $book->id }}" id="id" name="id">
                                <input type="hidden" value="{{ $book->name }}" id="name" name="name">
                                <input type="hidden" value="{{ $book->image_path }}" id="img" name="img">
                                <input type="hidden" value="{{ $book->slug }}" id="slug" name="slug">
                                <input type="hidden" value="{{ $book->description }}" id="description" name="description">
                                <input type="hidden" value="{{ $book->author }}" id="author" name="author">
                                <input type="hidden" value="{{ $book->price }}" id="price" name="price">

                                <input type="hidden" value="1" id="quantity" name="quantity">
                                <button class="btn btn-success" class="tooltip-test" title="add to cart">
                                    <i class="fa fa-shopping-cart"></i> Add to chart
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
@endsection
