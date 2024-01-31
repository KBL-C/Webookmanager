@extends('layouts.app')

@section('content')

<div class="container bg-dark">
    <h1 class="text-white row justify-content-center">Welcome to the WEB BOOK MANAGER</h1>
  <div class="row justify-content-center bg-secondary bg-opacity-50">
      <div id="carouselExampleCaptions" class="carousel slide w-25" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{url('/images/diariocomplice.png')}}" class="d-block w-100 mx-auto" alt="img1">
                <div class="carousel-caption d-none d-md-block text-black">
                  <h5>Last month most sold</h5>
                  <p>If you are interested, what are you waiting for?</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{url('/images/marbajoelsuelo.png')}}" class="d-block w-100 mx-auto" alt="img2">
                <div class="carousel-caption d-none d-md-block text-primary">
                  <h5>Last week most commented</h5>
                  <p>Go and share your own opinion</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{url('images/reinvetarse.png')}}"class="d-block w-100 mx-auto" alt="img3">
                <div class="carousel-caption d-none d-md-block text-success">
                  <h5>Last updated</h5>
                  <p>What are you waiting for to check?</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
  </div>
  <div>
      <h2 class="text-white row justify-content-center">If you're looking for reading pleasures you are in the right place!!</h2>
      <p class="text-info row justify-content-center"> The perfect place to buy, discuss with other readers and share your reading pleasure. </p>
  </div>
</div>
<div class="container bg-warning">
    <div>
        <p>Here, you will find the most rating, most sald and last updated dayly books.</p>
        <h4>Go and take a look, no compromise!!</h4>
    </div>
</div>
@endsection
