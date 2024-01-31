@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h2>Add new book</h2>
                @if (session('message'))
                    <div class="allert alert-success">
                        <h3><strong>{{session('message')}}</strong></h3>
                    </div>
                @endif
                <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!--Upload image-->
                    <div class="mb-3">
                        <img id="selectedImage" style="max-height: 540px;">
                        <label for="'image_path" class=" form-label uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload image</label>
                        <input class="form-control" name="image_path" id="image_path" type="file" class="hiden" required/>
                    </div>
                    @error('image_path')
                        <p><strong>{{$message}}</strong></p>
                    @enderror
                    <!--
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload image</label>
                        <div class='flex items-center justify-center w-full'>
                            <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    <svg class="w-3 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewbox="00 24 24" xmlns=""></svg>
                                    <p class='text-sm text-gray400 group-hover:text-pruple-600 pt-1 tracking-wider'>Select the image</p>
                                    <input name="image" id="image" type="file" class="hidden"/>
                                </div>
                            </label>
                        </div>
                    </div>
                    -->
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    @error('name')
                        <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                      <label for="slug" class="form-label">Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>
                    @error('slug')
                        <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    @error('description')
                        <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>
                    @error('author')
                        <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    @error('price')
                    <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <a href="{{ route('books.index')}}" class="btn btn-danger" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info text-light float-end">Save</button>

                </form>

            </div>
        </div>
    </div>

@endsection

