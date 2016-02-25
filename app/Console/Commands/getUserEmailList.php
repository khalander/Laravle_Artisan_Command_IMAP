<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class getUserEmailList extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'read:email';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'List all emails of  given user';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		
		// Increase the maximum execution time
		set_time_limit(4000); 

		// Display message message on command line
		$this->info("User's email list");
		 
	 	// Input from command line 		
	 	$type = $this->argument('type'); 		 // 1st argument
		$username = $this->argument('emailId');	 // 2ed argument
		$password = $this->argument('password'); // 3ed argument

		// Simple validation for 2nd and 3ed argument (required both or none)
		if ((!empty($username) && empty($password)) || (empty($username) && !empty($password))) {
			echo PHP_EOL . PHP_EOL . 
					"Both 2nd and 3ed parameter is mandatory if you have entering gmail credentials from command line" 
					. PHP_EOL . PHP_EOL;
			exit;
		}

		// Assigning default values if there are no inputs from command line
		if (empty($username)) {
			$username = 'compassites098@gmail.com';
		}
		
		if (empty($password)) {
			$password = 'test0987654321';
		}
		
		if (empty($type)) {
			$type = 'UNSEEN';
		}

		try {

			// Connect to gmail
			$imapPath = '{imap.gmail.com:993/imap/ssl}INBOX';
			$inbox = @imap_open(
						$imapPath,
						$username,
						$password,
						null,
						1,
						array('DISABLE_AUTHENTICATOR' => 'PLAIN')
					);
			
			// Normalize the data if exists
			if ($inbox) {
											
				$emails = imap_search($inbox, $type);
				
			    echo "*************************" . PHP_EOL;
				$output = '';
		 
				if ($emails) {
					foreach($emails as $mail) {
				    
				    $headerInfo = imap_headerinfo($inbox, $mail);
				    
				    $output .= $headerInfo->fromaddress . PHP_EOL;
				    $output .= $headerInfo->subject . PHP_EOL;
			  	    $output .= $headerInfo->date . PHP_EOL;
				   		    		   
				    $emailStructure = imap_fetchstructure($inbox, $mail);
				    
				    if(!isset($emailStructure->parts)) {
				         $output .= imap_body($inbox, $mail, FT_PEEK);
				    } else {
				        //    
				    }
				   echo $output;
				   echo "*************************" . PHP_EOL;
				   $output = '';
				}
				} else {
					echo PHP_EOL . PHP_EOL . 
						"Woohoo! You've read all the messages in your inbox." 
						. PHP_EOL . PHP_EOL;
				}
			}

	 	} catch (Exception $e) {
		 	echo PHP_EOL . PHP_EOL . 
					"whoops! looks like something went wrong" 
					. PHP_EOL . PHP_EOL;
	 	}

		@imap_expunge($inbox);
		@imap_close($inbox);

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['type', InputArgument::OPTIONAL, 'If you dont provide emailid, it will take default as UNSEEN'],
			['emailId', InputArgument::OPTIONAL, 'If you dont provide emailid, it will take default emailId'],
			['password', InputArgument::OPTIONAL, 'If you dont provide password, it will take default password'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}
*/
}
