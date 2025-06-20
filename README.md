  # Hôpital Management System (PHP MVC)
    
     /*/ What You Have to Do to Start ------------------------------------------------------------------
     
  1. Create the Database
        -Create a MySQL database named `hopital`
          (if u add new name (database) u have to chgange it in connect() function inside (services/database.php) )

  2. Install Composer (PHP package manager / to use  the export (PDF)) 
       If you don’t have Composer installed, follow these steps:
       Windows:
       Download and run the Composer installer: 👉 https://getcomposer.org/Composer-Setup.exe
        
       macOS/Linux:  Run this command in your terminal:  curl -sS https://getcomposer.org/installer | php
                                                         sudo mv composer.phar /usr/local/bin/composer

  3.  Run setup.php from the command line :
          use this command :  ( php setup.php )


⚙️ What Happens Automatically on Setup?
    The script creates all required tables:
      users
      patients
      dossier_medical
 
    If the users table is empty:
       It automatically loads fake demo data from db/fake_data.sql.


  ## you can use this users Accounts 
   | Username | Password | Role  | 
   |----------|----------|-------|
   | admin    | 1234     | admin |
   | user     | 1234     | user  |





     /*/ info  ------------------------------------------------------------------
    
 /structure of this steps //
│
├── database/
│   └── fake_data.sql       
├── services/
│   └── Database.php        
├── index.php
├── README.md   
├── setup.php                 
