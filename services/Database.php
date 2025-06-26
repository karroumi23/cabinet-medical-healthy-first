<?php

class Database {
    private static $pdo = null;

     // database connection 
     public static function connect() {
        //If no connection has been yet 
        if (self::$pdo === null) {
            // Create a new PDO connectio
            self::$pdo = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8', 'root', '');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
      }

    // Table creation logic
    private static function createTablesIfNotExist($pdo) {
        // Create users table
        //exec() used to execute SQL statements like (CREATE TABLE INSERT UPDATE DELETE ALTER TABLE)
        $pdo->exec(" 
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL,
                password VARCHAR(255) NOT NULL,
                role ENUM('admin', 'user') DEFAULT 'user',
                date_creation DATE DEFAULT NULL
            )"
         );

        // Create patients table
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS patients (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(100),
                prenom VARCHAR(100),
                age INT,
                genre CHAR(1),
                numero_securite_sociale VARCHAR(100),
                tel VARCHAR(100),
                adresse VARCHAR(255),
                date_ajout DATE DEFAULT NULL,
                cree_par VARCHAR(100)
            )
        ");

        // Create dossier_medical table
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS dossier_medical (
                id INT AUTO_INCREMENT PRIMARY KEY,
                patient_id INT,
                nom_complet VARCHAR(200),
                groupe_sanguin VARCHAR(10),
                type_maladie VARCHAR(200),
                diagnostic TEXT,
                date_admission DATE,
                date_fin_traitement DATE NULL,
                cout_traitement DECIMAL(10,2),
                acompte_cout DECIMAL(10,2),
                cree_par VARCHAR(100),
                FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE
            )
        ");
    }

// Import fake data unconditionally
private static function maybeImportFakeData($pdo) {
    $sqlPath = __DIR__ . '/../database/fake_data.sql'; 

    if (file_exists($sqlPath)) {
        echo "Loading fake data from: $sqlPath\n";
        $sql = file_get_contents($sqlPath);

        try {
            $pdo->exec($sql);
            echo "Fake data imported successfully.\n";
        } catch (PDOException $e) {
            echo "Error importing fake data: " . $e->getMessage() . "\n";
        }

    } else {
        echo "❌ fake_data.sql not found at: $sqlPath\n";
    }
}



    // Initialization   (i call it in setup.php only once)
    public static function initialize() {
            $pdo = self::connect();
    
            // Create tables if they don't exist
            self::createTablesIfNotExist($pdo);
    
            // Import fake data if needed
            self::maybeImportFakeData($pdo);
        }
    
}
