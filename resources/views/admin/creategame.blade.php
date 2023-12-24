@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        GameCritic - Create Game
                    </div>
                    <div class="card-body">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('store-form') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Game Name:</label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="studio" class="form-label">Studio:</label>
                                <input type="text" id="studio" name="studio" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="platform" class="form-label">Platform:</label>
                                <select id="platform" name="platform" class="form-select">
                                    <option value="PC">PC</option>
                                    <option value="xboxs">Xbox Series X/S</option>
                                    <option value="ps5">Playstation 5</option>
                                    <option value="nswitch">Nintendo Switch</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre:</label>
                                <select id="genre" name="genre" class="form-select">
                                    <option value="fps">First Person Shooter</option>
                                    <option value="action">Action</option>
                                    <option value="roleplay">Role Play</option>
                                    <option value="western">Western Style</option>
                                    <option value="comp">Competitive</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="releasedate" class="form-label">Release Date:</label>
                                <input type="date" id="releasedate" name="releasedate" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Image URL:</label>
                                <input type="text" id="image_url" name="image_url" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="short_description" class="form-label">Short Description:</label>
                                <input type="text" id="short_description" name="short_description" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
