<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;



class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): Response
    {
        
        return Inertia::render('Chirps/Index', [
            //
        ]);
    }

}
