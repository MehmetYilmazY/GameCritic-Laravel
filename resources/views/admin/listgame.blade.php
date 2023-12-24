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
                        GameCritic - Game List
                    </div>
                    
                    <div class="card-body">
                        <!-- Oyunları listeleyen tablo -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Studio</th>
                                    <th>Platform</th>
                                    <th>Genre</th>
                                    <th>Create Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listgame as $game)
                                    <tr>
                                        <td>{{ $game->title }}</td>
                                        <td>{{ $game->studio }}</td>
                                        <td>{{ $game->platform }}</td>
                                        <td>{{ $game->genre }}</td>
                                        <td>{{ $game->releasedate }}</td>
                                        <td>
                                            <a href="{{ route('creategame.edit', ['id' => $game->id]) }}" class="btn btn-primary">Edit</a>
                                        </td>
 
                                        <td>
                                            <!-- Delete Button with Confirmation Modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $game->id }}">
                                                Delete
                                            </button>
                                        </td>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="deleteModal{{ $game->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this game?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('creategame.destroy', ['id' => $game->id]) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Delete Confirmation Modal -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
