@extends('layouts.master')

@section('content')

    <!-- Header -->
    <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">GameCritic</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Rate Your Fav Game</p>
                </div>
            </div>
        </header>
        <!-- end header -->
    <div class="container">
        <div class="row">
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://www.metacritic.com/a/img/resize/5f4b922ca9a303354c7d117a2ed576f65f51a095/catalog/provider/6/12/6-1-944284-17.jpg?auto=webp&fit=cover&height=132&width=88" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Starfield</h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>

@endsection

@section('scripts')

@endsection