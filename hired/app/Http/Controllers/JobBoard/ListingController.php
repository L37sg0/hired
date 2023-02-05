<?php

namespace App\Http\Controllers\JobBoard;

use App\Http\Controllers\Controller;
use App\Models\Globals;
use App\Models\JobBoard\Listing;

class ListingController extends Controller
{
    public function index() {
        $listings = Listing::all();

        return view(Globals::THEME . '::' . 'layout.jobs-listing', compact('listings'));
    }

}
