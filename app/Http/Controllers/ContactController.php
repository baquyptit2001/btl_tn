<?php

namespace App\Http\Controllers;

use App\Jobs\ContactMessageJob;
use App\View\Components\HeroBread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ContactController extends Controller
{
    public function boot()
    {
        Blade::component('hero-bread', HeroBread::class);
    }

    public function index()
    {
        return view('pages.contact');
    }

    public function send(Request $request) {
        ContactMessageJob::dispatch($request->all());
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
