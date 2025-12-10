<?php

namespace App\Controllers;

class LegalController extends BaseController
{
    public function mentionsLegales()
    {
        $data = [
            'title' => 'Mentions Légales'
        ];
        return view('mentions_legales', $data);
    }

    public function cgv()
    {
        $data = [
            'title' => 'Conditions Générales de Vente'
        ];
        return view('cgv', $data);
    }

    public function confidentialite()
    {
        $data = [
            'title' => 'Politique de Confidentialité'
        ];
        return view('confidentialite', $data);
    }
}
