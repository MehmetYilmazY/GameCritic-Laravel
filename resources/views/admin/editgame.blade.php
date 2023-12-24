@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Edit Game
                    </div>
                    
                    <div class="card-body">
                        <!-- Edit Game Form -->
                            <form action="{{ route('creategame.update', ['id' => $game->id]) }}" method="post">
                            @csrf
                            @method('put')

                            <!-- Add your form fields for editing here -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Game Name:</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $game->title) }}">
                            </div>

                            <div class="mb-3">
                                <label for="studio" class="form-label">Studio:</label>
                                <input type="text" id="studio" name="studio" class="form-control" value="{{ old('studio', $game->studio) }}">
                            </div>

                            <div class="mb-3">
                                <label for="platform" class="form-label">Platform:</label>
                                <select id="platform" name="platform" class="form-select" value="{{ old('platform', $game->platfom) }}">
                                    <option value="PC">PC</option>
                                    <option value="xboxs">Xbox Series X/S</option>
                                    <option value="ps5">Playstation 5</option>
                                    <option value="nswitch">Nintendo Switch</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            <label for="genre" class="form-label">Genre:</label>
                            <select id="genre" name="genre" class="form-select">
                                <option value="fps" {{ old('genre', $game->genre) == 'fps' ? 'selected' : '' }}>First Person Shooter</option>
                                <option value="action" {{ old('genre', $game->genre) == 'fps' ? 'selected' : '' }}>Action</option>
                                <option value="roleplay" {{ old('genre', $game->genre) == 'fps' ? 'selected' : '' }}>Role Play</option>
                                <option value="western" {{ old('genre', $game->genre) == 'fps' ? 'selected' : '' }}>Western Style</option>
                                <option value="comp" {{ old('genre', $game->genre) == 'fps' ? 'selected' : '' }}>Competitive</option>
                                <!-- Diğer genre seçenekleri buraya eklenecek -->
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="releasedate" class="form-label">Release Date:</label>
                                <input type="date" id="releasedate" name="releasedate" class="form-control" value="{{ old('releasedate', $game->releasedate) }}">
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Image URL:</label>
                                <input type="text" id="image_url" name="image_url" class="form-control" value="{{ old('image_url', $game->image_url) }}">
                            </div>
                            <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description:</label>
                            <input type="text" id="short_description" name="short_description" class="form-control" value="{{ old('short_description', $game->short_description) }}" required>
                        </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
