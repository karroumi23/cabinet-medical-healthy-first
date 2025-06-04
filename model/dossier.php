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
           $pdo = Database::connect();
             // Convert empty strings to null 
                //condition ? value_if_true : value_if_false
               $groupe_sanguin = empty($groupe_sanguin) ? null : $groupe_sanguin;
               $type_maladie = empty($type_maladie) ? null : $type_maladie;
               $diagnostic = empty($diagnostic) ? null : $diagnostic;
               $date_fin_traitement = empty($date_fin_traitement) ? null : $date_fin_traitement;
               $cout_traitement = ($cout_traitement === '' || $cout_traitement === null) ? null : $cout_traitement;
               $acompte_cout = ($acompte_cout === '' || $acompte_cout === null) ? null : $acompte_cout;

            $sqlState = $pdo->prepare("INSERT INTO dossier_medical (id,patient_id, nom_complet, groupe_sanguin, type_maladie, diagnostic, date_admission, date_fin_traitement, cout_traitement,acompte_cout,cree_par )
                                      VALUES (NULL,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); //CURDATE() it's better than 'DEFAULT'
            $sqlState->execute([$patient_id, $nom_complet, $groupe_sanguin, $type_maladie, $diagnostic, $date_admission, $date_fin_traitement, $cout_traitement,$acompte_cout,$cree_par ]);
        
      }

    public static function updateDossier($id,$patient_id, $nom_complet, $groupe_sanguin, $type_maladie, $diagnostic, $date_admission, $date_fin_traitement, $cout_traitement,$acompte_cout)
      {
             $pdo = Database::connect();
             $sqlState = $pdo->prepare("UPDATE dossier_medical SET patient_id = ?, nom_complet = ?, groupe_sanguin = ?, type_maladie = ?, diagnostic = ?, date_admission = ?, date_fin_traitement = ?, cout_traitement = ?, acompte_cout = ?  WHERE id = ?");
           return $sqlState->execute([$patient_id, $nom_complet, $groupe_sanguin, $type_maladie, $diagnostic, $date_admission, $date_fin_traitement, $cout_traitement,$acompte_cout, $id]);
        
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