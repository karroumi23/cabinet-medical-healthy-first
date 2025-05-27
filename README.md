
 1. Create the Database
       -Create a MySQL database named `hopital`.

 2. What happened automatically when you installed this project in your browser ??
       1. Creates the database tables (users, patients, dossier_medical) using createTablesIfNotExist().
       2. Checks if the users table is empty.
          -If empty, it loads fake demo data from db/fake_data.sql.

  



 /structure of this steps /
│
├── database/
│   └── fake_data.sql       ✅ ← contains your demo data
├── services/
│   └── Database.php        ✅ ← handles table creation and auto import
├── index.php
├── README.md                  