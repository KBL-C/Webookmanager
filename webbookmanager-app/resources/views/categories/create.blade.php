@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h2>Add new category</h2>
                <form method="POST" action="{{route('categories.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label"> Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                      </div>
                      <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug">
                      </div>
                    <button type="submit" class="btn btn-info text-light float-end">Save</button>
                </form>

            </div>
        </div>
    </div>



@endsection
