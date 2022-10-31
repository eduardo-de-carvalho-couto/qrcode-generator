<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{
    public function index()
    {
        return view('generator');
    }

    public function getCard(Request $request)
    {
        $dados = $request->only('name', 'linkedin', 'github');
        [$name, $linkedin, $github] = [$dados['name'], $dados['linkedin'], $dados['github']];
        $user = User::where('linkedin', $linkedin)->where('github', $github)->first();
        
        if(is_null($user)){
            $card = $this->cardStore($name, $linkedin, $github);

            return to_route('generator.qrcode', $card);
        }

        return to_route('generator.qrcode', $user->card->id);
    }

    private function cardStore($name, $linkedin, $github)
    {
        $user = User::create([
            'name' => $name,
            'linkedin' => $linkedin,
            'github' => $github
        ]);

        $card = $user->card()->create();
        return $card;
    }

    public function generateQRCode(int $cardId)
    {
        $card = Card::find($cardId);

        if(is_null($card)){
            return to_route('generator.index');
        }

        $QRCode = QrCode::size(150)->generate(url("/" . $card->id . "/" . $card->user->name));

        return view('generator')->with('QRCode', $QRCode);
    }
}