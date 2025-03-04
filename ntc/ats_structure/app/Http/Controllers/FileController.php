<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __invoke()
    {
        return Storage::disk('local')->download(auth()->user()->resume_filename);
    }
}
