@extends('layouts.master')

@section('content')
<style>
        .header-with-image {
            background: url('https://images2.alphacoders.com/134/1343198.png') center center/cover no-repeat;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }
    </style>

    <!-- Header -->
 <header class="header-with-image py-10">
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
                    @foreach($games as $game)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Oyun Resmi -->
                            <img class="card-img-top" src="{{ $game->image_url }}" alt="Game Image" />

                            <!-- Oyun Detayları -->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Oyun Adı -->
                                    <h5 class="fw-bolder">{{ $game->title }}</h5>
                                    <!-- Oyun Fiyatı -->
                                    {{ $game->studio }}
                                </div>
                            </div>

                            <!-- Oyun İşlemleri -->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="{{ route('detail', ['id' => $game->id]) }}">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>

@endsection

@section('scripts')

@endsection