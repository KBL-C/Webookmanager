@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">
                <h1 class="text-center mb-5">Users</h1>

                <div class="row">
                    @foreach ($users as $user)
                        <div class="card mb-3">
                            <div class="card-body">
                                <!--Add image-->

                                <h3 class="card-title text-center mb-3">
                                    <a href="{{route('users.index', $user->id)}}" class="link-info text-black">{{$user->name}}</a>
                                </h3>

                                @can('users.destroy')
                                <div class="pag-2 mb-3 float-end">

                                    <!--delete button -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="formDelete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-end" role="button">Delete</button>
                                    </form>
                                </div>
                                @endcan


                                @can('users.edit')
                                    <div class="pag-2 mb-3 float-end">
                                        <!--edit button -->
                                        <a href="{{ route('users.edit', $user->id)}}" class="btn btn-info" role="button">Edit</a>
                                    </div>
                                @endcan






                            </div>

                        </div>

                    @endforeach
                </div>

            </div>

            <div class="d-flex justify-content-center">
                {!! $users->links() !!}
            </div>

        </div>
    </div>
@endsection
