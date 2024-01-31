@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">
                <h1 class="text-center mb-5">Contact info</h1>
                @if (session('message'))
                <div class="allert alert-success">
                    <h3><strong>{{session('message')}}</strong></h3>
                </div>
                @endif
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="book" class="form-label"> Book name</label>
                        <input type="text" class="form-control" id="book" name="book" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"> User name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    @error('name')
                        <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                        <label for="email" class="form-label">User email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    @error('email')
                    <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="number" class="form-control" id="phone" name="phone" required>
                    </div>
                    @error('phone')
                    <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                        <label for="direction" class="form-label">Direction</label>
                        <input type="text" class="form-control" id="direction" name="direction" required>
                    </div>
                    @error('email')
                    <p><strong>{{$message}}</strong></p>
                    @enderror

                    <div class="mb-3">
                        <label for="message" class="form-label">Email content</label>
                        <textarea name="message" id="message" class="form-control" rows="3" required></textarea>
                    </div>
                    @error('message')
                    <p><strong>{{$message}}</strong></p>
                    @enderror

                      <button type="submit" class="btn btn-info text-light float-end">Send email</button>
                </form>

            </div>
        </div>
    </div>
@endsection
