Reading emails from gmail using Laravel 5 artisan command & IMAP 

/home/khalender/www/demo/app/Console/Commands/getUserEmailList.php
First need to install IMAP if your are not already installed

In ubuntu:
sudo apt-get install php5-imap
sudo php5enmod imap
sudo service apache2 restart

Create a artisan command 
php artisan make:console getUserEmailList --command=read:email
This creates a command skeleton in app/Console/Commands/getUserEmailList.php
You can copy paste the code which in this file into your own file
  
Execute the file

Syntax:
php artisan read:email [type, emailId, Password]
 
Note:
All arguments are optional
If you want to pass user credentials then need to as 2ed and 3ed parameter
 
Default values are
type: UNSEEN (For more please refer reference link)
emailId:compassites098@gmail.com
password:test0987654321

php artisan read:email 
If we execute this command it will take all default values
and gets all unread mails 
 
php artisan read:email ALL
Will get all mails from default user account

php artisan read:email SEEN compassites098@gmail.com test0987654321
Will get all read mails from given user account

TODO
- Need to add proper validtion for errors
- Need to customize for all hosts

Reference link:
https://arjunphp.com/reading-emails-from-gmail-using-php-imap/