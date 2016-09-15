<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use Auth;
use Request;
use App\User;
use PDO;

class BillsController extends Controller
{
    public function create()
    {   

        return view('bills');

    }

    public function store()
    {
    	$input_name = Request::get('name');
    	$input_payment = Request::get('payment');
    	$clientid = Auth::user()->id;




	    DB::table('bills')->insert(
			array(
			    'name'     =>   $input_name, 
			    'payment'   =>   $input_payment,
			    'userid'	=>	$clientid
			)
		);



    	return redirect('bills');
    }
}
