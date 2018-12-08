<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gig;
use App\User;
use Illuminate\Http\Request;

class GigController extends Controller
{

    function getAllGigs()
    {
        $gigs = Gig::all();
        return response()->json($gigs);
    }

    function getThisGig($id)
    {
        $gig = Gig::find($id);
        return response()->json($gig);
    }

    function getGigOfCategory($category_id)
    {
        $gigs = Category::find($category_id)->gig;
        return response()->json($gigs);
    }

    function getUserGig($id)
    {
        $gigs = User::find($id)->gig;
        return response()->json($gigs);
    }

    function create(Request $req)
    {
        $gig = new Gig();
        $gig->title = $req->title;
        $gig->description = $req->description;
        $gig->price = $req->price;
        $gig->image = $req->image;
        $gig->category_id = $req->category_id;
        $gig->duration = $req->duration;
        $gig->user_id = $req->user_id;
        $gig->save();

        $gigs = User::find($req->user_id)->gig;

        return response()->json($gigs);

    }

    function update(Request $req){
        $gig = Gig::find($req->id);
        $gig->title = $req->title;
        $gig->description = $req->description;
        $gig->price = $req->price;
        $gig->image = $req->image;
        $gig->category_id = $req->category_id;
        $gig->duration = $req->duration;
        $gig->user_id = $req->user_id;
        $gig->save();

        return response()->json($gig);
    }

    function deleteGig($id){
        $gig = Gig::find($id);
        $gig->delete();

        $gigs = $gigs = User::find($gig->user_id)->gig;

        return response()->json($gigs);
    }
}
