<?php
   require_once 'services/Database.php';


  class Dossier {    
    

    public static function getDossier($patient_id)
      {
          $pdo = Database::connect(); 
          $sqlState = $pdo->prepare('SELECT * FROM dossier_medical WHERE patient_id = ?');
          $sqlState->execute([$patient_id]);
          return $sqlState->fetchAll(PDO::FETCH_OBJ);
      }
      
       
    public static function createDossier($patient_id, $nom_complet, $groupe_sanguin, $type_maladie, $diagnostic, $date_admission, $date_fin_traitement, $cout_traitement,$acompte_cout,$cree_par )
      {
            //  Convert empty date to NULL for compatibility with MySQL DATE
             if (empty($date_fin_traitement)) {
                $date_fin_traitement = null;
              }
           $pdo = Database::connect();
            $sqlState = $pdo->prepare("INSERT INTO dossier_medical (id,patient_id, nom_complet, groupe_sanguin, type_maladie, diagnostic, date_admission, date_fin_traitement, cout_traitement,acompte_cout,cree_par )
                                      VALUES (NULL,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); //CURDATE() it's better than 'DEFAULT'
            $sqlState->execute([$patient_id, $nom_complet, $groupe_sanguin, $type_maladie, $diagnostic, $date_admission, $date_fin_traitement, $cout_traitement,$acompte_cout,$cree_par ]);
        
      }

    public static function updateDossier()
      {
         //..........
      }


    public static function destroyDossier($id) 
       {
         $pdo = Database::connect();
         $sqlState =$pdo->prepare("DELETE FROM dossier_medical WHERE id=?" );
           return $sqlState->execute([$id]);
       }
 

       public static function viewDossier($id) //$id from controller 
       {
         $pdo = Database::connect();
         $sqlState = $pdo->prepare('SELECT * FROM dossier_medical WHERE id=?');
         $sqlState->execute([$id]);
         return $sqlState->fetch(PDO::FETCH_OBJ); 
       }
    }