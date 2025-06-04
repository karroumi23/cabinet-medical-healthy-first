     /*/ what you have to do ------------------------------------------------------------------
     
 1. Create the Database
        -Create a MySQL database named `hopital`
          (if u add new name (database) u have to chgange it in connect() function inside (services/database.php) )
    
 3.  Run setup.php from the command line :
          use this command :  ( php setup.php )


 4. What happened automatically when you installed this project in your browser ??
       1. Creates the database tables (users, patients, dossier_medical) using createTablesIfNotExist().
       2. Checks if the users table is empty.
          -If empty, it loads fake demo data from db/fake_data.sql.

  


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
