<?php
/*
	This file is for laravel package. if you use this project without laravel please ignore this
*/
return [
    'host'          	=>      'imap.gmail.com', // this is your server


    'username'     	 	=>      'muhammed.khalander@gmail.com', // here is your server username. ex: john@gmail.com

    'password'      	=>      'darderaza7869225',


    'port'          	=>      993,


    'driver'        	=>      'imap', // you can use pop3 also

    'ssl'				=>		true, // if you use ssl supported host then use it true otherwise false


    'novalidate'	 	=>  	false, // if you use own server certificate then use true


    'auto-connect'  	=> 		false  // if it set true then autometically connect with server in every request
];
