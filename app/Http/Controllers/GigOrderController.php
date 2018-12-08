<?php

namespace App\Http\Controllers;

use App\Gig;
use App\GigOrder;
use App\User;
use Illuminate\Http\Request;

class GigOrderController extends Controller
{
    function orderNow(Request $req){
        $order = new GigOrder();
        $order->gig_id = $req->gig_id;
        $order->user_id = $req->user_id;
        $order->save();

        return response()->json($order);

    }

    function getYourOrders($id){
        $gigs = User::find($id)->gig;
        $orders = [];
        $gig_orders=null;
        foreach($gigs as $gig){
            $gig_orders = Gig::find($gig->id)->gig_order;
            foreach($gig_orders as $gig_order){
                $gig = GigOrder::find($gig_order->id)->gig()->with('user')->get();
                array_push($orders,$gig);
            }


        }
        return response()->json($orders);
    }

    function getOrdersFromYou($id){
        $gig_orders = User::find($id)->gig_order;

        $orders = [];

        foreach($gig_orders as $gig_order){
            $gig = Gig::find($gig_order->gig_id);
            array_push($orders,$gig);
        }

        return response()->json($orders);

    }
}
