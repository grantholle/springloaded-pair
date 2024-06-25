<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ShowFormController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Form/Show');
    }
}
