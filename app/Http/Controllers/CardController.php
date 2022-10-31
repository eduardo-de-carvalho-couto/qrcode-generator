<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardFormRequest;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{
    public function index()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('generator')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function getCard(CardFormRequest $request)
    {
        $dados = $request->only('name', 'linkedin', 'github');
        [$name, $linkedin, $github] = [$dados['name'], $dados['linkedin'], $dados['github']];
        $user = User::where('linkedin', $linkedin)->where('github', $github)->first();
        
        if(is_null($user)){
            $card = $this->cardStore($name, $linkedin, $github);

            return to_route('generator.qrcode', $card)
                ->with('mensagem.sucesso', "Card generated");
        }

        return to_route('generator.qrcode', $user->card->id)
            ->with('mensagem.sucesso', "Card generated");
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
        $card = Card::with('user')->find($cardId);

        if(is_null($card)){
            return to_route('generator.index');
        }

        $QRCode = QrCode::size(150)->generate(url("/card/" . $card->id . "/" . strtolower($card->user->name)));

        $mensagemSucesso = session('mensagem.sucesso');

        return view('generator')->with('QRCode', $QRCode)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function showCard(Card $card)
    {
        $user = $card->user->toArray();
        [$name, $linkedin, $github] = [$user['name'], $user['linkedin'], $user['github']];

        return view('card')->with('name', $name)->with('linkedin', $linkedin)->with('github', $github);
    }
}