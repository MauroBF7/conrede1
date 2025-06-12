<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Mail\Mailable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class EnviaSolAltTelefone extends Controller{
   // public function sendAltRamal(Telefone $telefone){
     //   echo "chamada correta! <br>";
       // dd($telefone);
   // }
}
