@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">
                <h1 class="text-center text-muted mb-5">Set a role</h1>
                @if (session('info'))
                <div class="allert alert-success">
                    <strong>{{session('info')}}</strong>
                </div>
                @endif
                <div class="card">

                    <div class="card-body">
                        <p>Name:</p>
                        <p class="form-control">{{$user->name}}</p>

                        <h5>Role types</h5>
                        <form method="POST" action="{{route('users.update', $user->id)}}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary text-light float-end">Asign role</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
