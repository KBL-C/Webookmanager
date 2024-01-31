@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h2>Update Book</h2>
                @if (session('message'))
                    <div class="allert alert-success">
                        <h3><strong>{{session('message')}}</strong></h3>
                    </div>
                @endif
                <form method="POST" action="{{route('books.update', $book->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <img src="/images/{{ $book->image_path }}" class="card-img-top mx-auto" style="height: 250px; width: 200px;display: block;" id="selectedImage">
                        <label for="image_path" class="form-label"> Image</label>
                        <input class="form-control" name="image_path" id="image_path" type="file" class="hiden"/>
                    </div>
                    @error('image_path')
                    <p><strong>{{$message}}</strong></p>
                    @enderror
                    <div class="mb-3">
                      <label for="name" class="form-label"> Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$book->name}}">
                    </div>
                    <div class="mb-3">
                      <label for="slug" class="form-label">Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" value="{{$book->slug}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$book->description}}">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{$book->price}}">
                    </div>

                    <div class="mb-3">
                        <select class="form-control" name="category_id" value="{{$book->category_id}}">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pag-2 mb-3 float-end">
                        <!--canel button -->
                        <a href="{{ route('books.show', $book)}}" class="btn btn-danger" role="button">Cancel</a>
                   </div>
                    <button type="submit" class="btn btn-info text-light float-end">Update</button>
                </form>

            </div>
        </div>
    </div>



@endsection
