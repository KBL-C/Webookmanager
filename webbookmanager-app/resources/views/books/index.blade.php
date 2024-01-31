@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">
                <h1 class="text-center mb-5">Books</h1>

                @can('books.create')
                <div class="d-grid pag-2 mb-3">
                    <a href="{{route('books.create')}}" class="btn btn-primary btn-sm">New Book</a>
                </div>
                @endcan

                <div class="row">
                    @if(count($books)<=0)
                        <div class="allert alert-success text-center">
                            <strong>Result not found!!!</strong>
                        </div>
                    @else
                        @foreach ($books as $book)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <!--Add image-->
                                    <img src="/images/{{ $book->image_path }}" class="card-img-top mx-auto" style="height: 250px; width: 200px;display: block;" alt="{{ $book->image_path }}">

                                    <h3 class="card-title text-center mb-3">
                                        <a href="{{route('books.show', $book->id)}}" class="link-info text-black">{{$book->name}}</a>
                                    </h3>
                                    <p class="card text-muted"> {{$book->description}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Author: {{$book->author}}</li>
                                    <li class="list-group-item"><h5><span class="badge bg-primary">${{$book->price}}</span></h5></li>
                                </ul>

                                    <!--Add book to the chart-->
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $book->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $book->name }}" id="name" name="name">
                                    <input type="hidden" value="{{ $book->image_path }}" id="img" name="img">
                                    <input type="hidden" value="{{ $book->slug }}" id="slug" name="slug">
                                    <input type="hidden" value="{{ $book->description }}" id="description" name="description">
                                    <input type="hidden" value="{{ $book->author }}" id="author" name="author">
                                    <input type="hidden" value="{{ $book->price }}" id="price" name="price">


                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                    <div class="card-footer" style="background-color: white;">
                                        <div class="row">
                                            <button class="btn btn-info btn-sm" class="tooltip-test" title="add to cart">
                                                <i class="fa fa-shopping-cart"></i> Add to chart
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>


                        @endforeach
                    @endif

                </div>
                <div class="d-flex justify-content-center">
                    {!! $books->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
