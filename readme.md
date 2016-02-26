<p><b> Reading emails from gmail using Laravel 5 artisan command & IMAP </b></p>

<p><b>First need to install IMAP if your are not already installed</b> <br />
In ubuntu:<br />
sudo apt-get install php5-imap<br />
sudo php5enmod imap<br />
sudo service apache2 restart<br />
</p>

<p><b>Create a artisan command </b> <br />
php artisan make:console getUserEmailList --command=read:email<br />
This creates a command skeleton in app/Console/Commands/getUserEmailList.php<br />
You can copy paste the code which in this file into your own file<br />
  
<p><b>Execute the file </b> <br />
Syntax:
php artisan read:email [type, emailId, Password] <br /> <br />
 
<b>Note:</b> <br />
All arguments are optional <br />
If you want to pass user credentials then need to as 2ed and 3ed parameter <br />
 
<p><b>Default values are</b> <br />
type: UNSEEN (For more please refer reference link)<br />
emailId:compassites098@gmail.com<br />
password:test0987654321<br /><br />

<b>php artisan read:email </b> <br />
If we execute this command it will take all default values<br />
and gets all unread mails <br /><br />
 
<b>php artisan read:email ALL</b> <br />
Will get all mails from default user account<br /><br />

<b>php artisan read:email SEEN compassites098@gmail.com test0987654321</b> <br />
Will get all read mails from given user account<br /><br />

<b>TODO</b> <br />
- Need to add proper validtion for errors<br />
- Need to customize for all hosts<br /><br />

<b>Reference link:</b> <br />
https://arjunphp.com/reading-emails-from-gmail-using-php-imap/
</p>
