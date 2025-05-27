<?php
class Database {
    private static $pdo = null;

    public static function connect() {
        if (self::$pdo === null) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8', 'root', '');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // ✅ Create tables if they don't exist
            self::createTablesIfNotExist(self::$pdo);

            // ✅ Auto-import fake data if necessary
            self::maybeImportFakeData(self::$pdo);
        }

        return self::$pdo;
    }

    private static function createTablesIfNotExist($pdo) {
        // Create users table
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL,
                password VARCHAR(255) NOT NULL,
                role ENUM('admin', 'user') DEFAULT 'user',
                date_creation DATE DEFAULT CURDATE()
            )
        ");

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
                date_ajout DATE DEFAULT CURDATE(),
                cree_par VARCHAR(100)
            )
        ");

        //  - Create dossier_medical table
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

    private static function maybeImportFakeData($pdo) {
        // Check if users table is empty
        $stmt = $pdo->query("SELECT COUNT(*) FROM users");
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            $sqlPath = __DIR__ . '/../db/fake_data.sql'; // Adjust path as needed

            if (file_exists($sqlPath)) {
                $sql = file_get_contents($sqlPath);
                $pdo->exec($sql);
            } else {
                error_log("⚠️ fake_data.sql not found at: $sqlPath");
            }
        }
    }
}
