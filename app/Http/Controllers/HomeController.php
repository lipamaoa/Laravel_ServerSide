<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $myVar='Hello World';
        $contactInfo = $this->getContactInfo();
        return view('home', compact('myVar', 'contactInfo'));
    }

    private function getContactInfo()
    {
        $contactInfo = [
            'name' => 'Filipa Santos',
            'email' => 'filipa.santos@gmail.com'
        ];

        return $contactInfo;
    }
}