@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">
                <h1 class="text-center mb-5">{{$book->name}}</h1>
                <div class="row">
                  <div class="col-md-8-mx-auto">

                    <div class="card mb-3">

                        <img src="/images/{{ $book->image_path }}"
                        class="card-img-top mx-auto"
                        style="height: 250px; width: 200px;display: block;"
                        alt="{{ $book->image_path }}">

                        <div class="card-body">
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

                </div>

            </div>
             <!--comentarios-->
            <div class="comment-area-mt-4">
                @if (session('message'))
                    <h6 class="alert alert-warning mb-3">{{session('message')}}</h6>
                @endif
                <div class="card card-body">
                    <h4 class="card-title"> Leave a comment</h4>
                    <form action="{{url('comments')}}" method="POST">
                        @csrf
                        <input type="hidden" name="bookSlug" value="{{$book->slug}}">
                        <textarea name="commentBody" class="form-control" rows="3" required></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Publish</button>
                    </form>
                </div>

                @forelse ($book->comments as $comment)



                <div class="card card-body shadow-sm mt-3">
                    <div class="detail-area">
                        <h6 class="user-name mb-1">
                            @if ($comment->user)
                                <strong>{{$comment->user->name}}</strong>
                            @endif
                            <small class="ms-3 text-primary">Commented on: {{$comment->created_at->format('d-m-Y')}}</small>
                        </h6>
                        <p class="user-comment mb-1">
                            {!! $comment->commentBody!!}
                        </p>
                    </div>
                    @if (Auth::check() && Auth::id()== $comment->user_id)
                        <div>
                             <!--delete button -->
                             <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="formDelete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm me-2" role="button">Delete</button>
                            </form>
                        </div>
                    @endif

                </div>

                @empty
                <div class="card card-body shadow-sm mt-3">
                    <h6>No comments yet</h6>
                </div>
                @endforelse

            </div>
        </div>
    </div>
@endsection


<script>
    (function () {
    'use strict'

    var forms = document.querySelectorAll('.formDelete')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }
                Swal.fire({
                    title: 'Are you sure, you want to remove it?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    showCancelButtonColor: '#6c757d',
                    confirmButtonText: 'Delete',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('Delete!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
                })
            }, false)
            })
    })()
</script>
