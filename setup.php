<?php

// call classe Database
require_once './services/Database.php';

//do this 
try { 
    // Appeler la méthode d'initialisation from (database.php)
    Database::initialize();
    echo " Base de données initialisée avec succès !\n";
    echo "- Tables créées\n";
    echo "- Données de test (fake data ) created  \n";
    
  } 
  // if there is problem do this 
catch (Exception $e) { 
    echo " Erreur lors de l'initialisation : " . $e->getMessage() . "\n";
}
?>