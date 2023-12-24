<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Games;
use MarcReichel\IGDBLaravel\Builder as IGDB;
use MarcReichel\IGDBLaravel\Models\Game;
use GuzzleHttp\Client; // Bu satırı koruyun
use App\Models\GameRating;
use Illuminate\Support\Facades\Config;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creategame = Games::all();
        return view('admin.creategame', compact('creategame'));
    }

    public function listGame()
    {
        $listgame = Games::all();

        return view('admin.listgame', compact('listgame'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.creategame');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'studio' => 'required',
            'platform' => 'required',
            'genre' => 'required',
            'releasedate' => 'required|date',
            'image_url' => 'required',
            'short_description' => 'required'
        ]);

        Games::create($request->all());

        return redirect()->route('admin.creategame')->with('status', 'Game created successfully!');
    }

    public function edit($id)
    {
        $game = Games::findOrFail($id);

        return view('admin.editgame', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'studio' => 'required',
            'platform' => 'required',
            'genre' => 'required',
            'releasedate' => 'required|date',
            'image_url' => 'required',
            'short_description' => 'required'
        ]);

        $game = Games::findOrFail($id);
        $game->update([
            'title' => $validatedData['title'],
            'studio' => $validatedData['studio'],
            'platform' => $validatedData['platform'],
            'genre' => $validatedData['genre'],
            'releasedate' => $validatedData['releasedate'],
            'image_url' => $validatedData['image_url'],
            'short_description' => $validatedData['short_description']

        ]);

        return redirect()->route('admin.listgame')->with('status', 'Game updated successfully!');
    }

    public function destroy($id)
    {
        $game = Games::findOrFail($id);
        $game->delete();

        return redirect()->route('admin.listgame')->with('status', 'Game deleted successfully!');
    }

        public function showGames()
        {
            $games = Games::all(); // Tüm oyunları al

            return view('homepage', compact('games')); // Oyunları view'e gönder
        }

        public function getDetail()
        {
            $games = Games::all(); // Tüm oyunları al

            return view('detail', compact('games')); // Oyunları view'e gönder
        }


public function show($id)
{
    $games = Games::all();
    $game = Games::findOrFail($id);
    $relatedGames = Games::inRandomOrder()->limit(4)->get();
    $gameratings = GameRating::where('game_id', $id)->get();

    $client = new Client();
    $apiUrl = 'https://api.igdb.com/v4/games';
    $apiKey = '6g3aupp63jbn2b2vq6hjb3sty7zkkf';
    $clientID = 'eoyumr27c6rhw1pm88cqr8e8xpiazy';

    // IGDB API'ye sorgu göndermek için başlık (title) kriterini kullan
    $response = $client->request('GET', $apiUrl, [
        'headers' => [
            'Authorization' => 'Bearer ' . $apiKey,
            'Client-ID' => $clientID,
            'Accept' => 'application/json',
        ],
        'query' => [
            'search' => $game->title, // Lokal veritabanındaki oyunun başlığını kullan
            'fields' => 'id,name,storyline,total_rating', // İsteğe bağlı: Dönen alanları sınırla
        ],
    ]);

    if ($response->getStatusCode() == 200) {
        // JSON verisini çözümleyin
        $igdbGames = json_decode($response->getBody(), true);
    }    
    else {
        // Hata durumunda işlemler
        echo 'API isteği başarısız oldu. Hata kodu: ' . $response->getStatusCode();
        echo "\n" . $response->getBody(); // Hatanın ayrıntılarını görüntüle
        $igdbGames = [];
    }

    return view('detail', compact('game', 'games', 'relatedGames', 'gameratings', 'igdbGames'));
}


        public function getGameData(Request $request){
            $igdb = new IGDB('games'); // 'games' endpoint'i
        
            // IGDB'den oyun verilerini al
            $gamedata = $igdb->get();
        
            // Gelen veriyi view'e geçir
            return view('homepage', compact('gamedata'));
        }

        public function rateGame(Request $request)
            {
                // Kullanıcının giriş yapmış olup olmadığını kontrol etmek için gerekirse middleware ekleyin

                $request->validate([
                    'game_id' => 'required|exists:games,id',
                    'rating' => 'required|integer|min:1|max:5',
                ]);

                $user_id = auth()->id(); // Varsa kullanıcı oturumu

                GameRating::updateOrCreate(
                    ['user_id' => $user_id, 'game_id' => $request->game_id],
                    ['rating' => $request->rating]
                );

                return redirect()->back()->with('success', 'Game rated successfully!');
            }
            
            public function showGameDetail($id)
            {
                $game = Game::with('ratings')->find($id);
                $ratings = $game->ratings;

                return view('detail', compact('game', 'ratings'));
            }
}
