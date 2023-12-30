<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cars;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;



class FormController extends Controller
{
    public function submitCarForm(Request $request)
    {
        // Formdan gelen verileri al
        $formData = $request->all();

        // Veritabanına ekle
        Cars::create($formData);

        // Başarılı bir şekilde ekledikten sonra aynı sayfaya dön
        return back()->with('success', 'Form başarıyla gönderildi!');
    }

    public function listCarForm()
    {
        $listrequests = Cars::all();
    
        // Fetch the first car request (you may want to adjust this logic based on your requirements)
        $carRequest = Cars::first();
    
        return view('admin.listrequest', compact('listrequests', 'carRequest'));
    }
    
    public function showCarForm($id)

        
    {
        $listrequests = Cars::all();
        $carRequest = Cars::findOrFail($id);
        $comments = Comment::where('car_request_id', $id)->get();

    
        return view('admin.showrequest', compact('carRequest', 'listrequests', 'comments' ));
    }

    public function editCarForm($id)
    {
        $carRequest = Cars::findOrFail($id);
        
        return view('admin.aracedit', compact('carRequest'));
    }

    public function updateCarForm(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Validasyon kurallarını buraya ekleyin
        ]);

        Cars::where('id', $id)->update($validatedData);

        return redirect()->route('admin.showrequest', $id)->with('success', 'Araç talebi başarıyla güncellendi!');
    }

    public function deleteCarForm($id)
    {
        Cars::findOrFail($id)->delete();

        return redirect()->route('admin.listrequest')->with('success', 'Araç talebi başarıyla silindi!');
    }

        public function addComment(Request $request, $carRequestId)
        {
            $request->validate([
                'comment' => 'required|string',
            ]);

            Comment::create([
                'car_request_id' => $carRequestId,
                'user_name' => auth()->user()->name, // Ya da kullanıcı adını nereden alıyorsanız ona göre düzenleyin
                'email' => auth()->user()->email, // Ya da kullanıcı adını nereden alıyorsanız ona göre düzenleyin
                'comment' => $request->input('comment'),
            ]);

            return back()->with('success', 'Mesaj başarıyla eklendi!');
        }

}
