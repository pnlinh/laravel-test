<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getQuestions()
    {
        $path = public_path('questions.json');

        return file_get_contents($path);
    }
}
