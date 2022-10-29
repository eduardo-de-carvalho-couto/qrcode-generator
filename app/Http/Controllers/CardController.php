<?php

namespace App\Http\Controllers;

use LaravelQRCode\Facades\QRCode;

class CardController extends Controller
{
    public function generateQRCode()
    {
        return view('qrcode');
    }
}