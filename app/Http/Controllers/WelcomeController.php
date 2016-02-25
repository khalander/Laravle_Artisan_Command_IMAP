<?php namespace App\Http\Controllers;

use  App\Profile;
use Nahidz\Imapx\Imapx;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(Imapx $imap)
	{


		//$imap->connect(); // if auto-connect = false
	    //$inbox = $imap->getInbox();

		set_time_limit(4000); 

		$imapPath = '{imap.gmail.com:993/imap/ssl}INBOX';
		$username = 'muhammed.khalander@gmail.com';
		$password = 'darderaza7869225';

		$inbox = imap_open($imapPath,$username,$password,null,1,array('DISABLE_AUTHENTICATOR' => 'PLAIN')) or die('Cannot connect to Gmail: ' . imap_last_error()); 


		$emails = imap_search($inbox,'UNSEEN');
		//dd(imap_errors());
		//dd($emails);

		imap_expunge($inbox);
		imap_close($inbox);

	    
	    dd($inbox);

		dd(Profile::all());
		return view('welcome');
	}

}
