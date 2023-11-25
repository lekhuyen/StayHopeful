<?php

namespace App\Http\Controllers;

use App\Models\Sensitive;
use Illuminate\Http\Request;

class SensitiveController extends Controller
{
    public function index() {
        $sensitives = Sensitive::all();
        return view ('sensitive.index', compact('sensitives'));
    }

    public function create() {
        return view ('sensitive.create');
    }

}
