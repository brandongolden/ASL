<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use Auth;
use Request;
class IncomeController extends Controller
{
    public function create()
    {
    	return view('income');
    }

    public function store()
    {
    	$input = Request::get('myincome');
    	$clientid = Auth::user()->id;



		$results = DB::table('income')->where('id', $clientid)->pluck('income');

		$results = DB::table('income')
		    ->where('id', '=', Auth::user()->id)
		    ->count();
		//echo $results;

		if ($results == 0) {
		    // It does not exist
		    echo "No results";

		    DB::table('income')->insert(
				array(
				    'id'     =>   $clientid, 
				    'income'   =>   $input
				)
			);

			echo "Insert Successful";

		} else {
		    // It exists

		   	DB::table('income')->where('id', $clientid)->update(array('income' => $input));
		   	echo "Update Successful";
		}

    	return redirect('home');
    }
}
