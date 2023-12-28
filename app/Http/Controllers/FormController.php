<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cars;
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

        return view('admin.listrequest', compact('listrequests'));
    }

}
