<?php

namespace App\Http\Controllers;

use App\Models\ContestNotice;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index($id)
    {
            $notice = ContestNotice::find($id); //verifica se o edital existe
            if (isset($notice)) {
                if ($notice->forms) { // verifica se o candidato já esta cadastrado no edital
                    return redirect()->route('user.dashboard');
                }else{
                    return view('user.form.form',['contest_notice_id' => $id]);
                }
            }
            return redirect()->route('user.dashboard');
    }
}
