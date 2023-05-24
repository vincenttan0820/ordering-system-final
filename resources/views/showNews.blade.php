@extends('layouts.app')
@section('title', 'News')
@section('content')
<div class="container-fluid">
      <!-- Page Heading -->
 
  <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
    <h1 class="h3 mb-0 text-gray-800">News</h1>
  </div>
</div>

<!-- Content Page -->
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Brand New Branch Opening !!!</h5>
                        <p class="card-text">Welcome the 900th buddys to join us. We are located in Sungai Long Area. We will giveaway free drinks for 1-month.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Drinks is awaiting for you!!!</h5>
                        <p class="card-text">Announcing brand new drink from our company!!!! Which is pew pew fresh milk. Available from 30th February 2099.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/image1.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/image2.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/image3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Company History</h5>
                        <p class="card-text">We establish our company since 1999. We have vision on promoting the best drink for everyone to enjoy no matter in which mood they have.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Us</h5>
                        <p class="card-text">Email: bobadrink@hahamail.com</p>
                        <p class="card-text">Phone: 03-12345678</p>
                        <p class="card-text">Address: Universiti Tunku Abdul Rahman, Jalan Sungai Long, Bandar Sungai Long, 43000 Kajang, Selangor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-43w5L6HQ5U6R5UWY9X6vww00q3jKGMHpvC90oKzSg7S3bu3xmyLlzHjLOZG4dk4V05dO+Rf7VWl28/Ufjz0x0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-lKpO/pGFxEj1wukrL/z0U0nmjR6J5U6v+UQY9XbFl0+kq3a13Sij7V2nSSzMYMcnVq3Lx4glEZpY4DnIQn7RKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endsection