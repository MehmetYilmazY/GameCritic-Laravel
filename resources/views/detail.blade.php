@extends('layouts.master')

@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $game->image_url }}" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">{{ $game->studio }}</div>
                    <h1 class="display-5 fw-bolder">{{ $game->title }}</h1>
                    <p class="lead">Genre: {{ $game->genre }}</p>

                    <!-- Storyline -->
                    @if (isset($igdbGames[0]['storyline']))
                    <p clas="lead">Storyline: {{ $igdbGames[0]['storyline'] }}</p>
                @else
                    <p class="lead">{{ $game->short_description }}</p>
                @endif
                    <!-- Total Rating -->
                    @if (isset($igdbGames[0]['total_rating']))
                    <p clas="lead">IGDB Rating: {{ $igdbGames[0]['total_rating'] }}</p>
                @else
                    <p class="lead">IGDB Rating not available.</p>
                @endif
                    <p class="lead">GameCritic Average Rating: {{ $gameratings->avg('rating') }}</p>
                    <!-- Game Rating Form -->
                    <form action="{{ route('rateGame') }}" method="post">
                        @csrf
                        <input type="hidden" name="game_id" value="{{ $game->id }}">
                        <label for="rating">Rate this game:</label>
                        <input type="number" name="rating" min="1" max="5" required>
                        <button type="submit">Submit Rating</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related games</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($relatedGames as $relatedGame)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $relatedGame->image_url }}" alt="Game Image" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $relatedGame->title }}</h5>
                                    <!-- Product Studio-->
                                    {{ $relatedGame->studio }}
                                    <!-- Product Desc-->
                                    <p class="lead">{{ Illuminate\Support\Str::limit($relatedGame->short_description, 35) }}</p>
                                    <!-- Product score-->
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('detail', ['id' => $relatedGame->id]) }}">View options</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
