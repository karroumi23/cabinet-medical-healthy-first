<?php
  class dossierController {


    public function dossierAction($patient_id) //show_dossier
    {
        $dossier = Dossier::getDossier($patient_id);
        //Get nom_complet and patient_id from the first record if available
          $nom_complet = !empty($dossier) ? $dossier[0]->nom_complet : '';
        require_once 'views/patient/dossierMedical/show_dossiers.php';
    }
    
       

       public function createDossierAction($id, $nom_complet)
       {
           require_once 'views/patient/dossierMedical/create_dossier.php';
       }
       
     public function storeDossierAction()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Securely get the current user from the session
                $cree_par = $_SESSION['user']['username'];
                // Call the model to insert the dossier
                Dossier::createDossier ($_POST['patient_id'],
                $_POST['nom_complet'],
                $_POST['groupe_sanguin'],
                 $_POST['type_maladie'],
                 $_POST['diagnostic'],
                 $_POST['date_admission'],
                 $_POST['date_fin_traitement'],
                $_POST['cout_traitement'],
                $_POST['acompte_cout'],
                $cree_par);
        
                // Set session message and redirect
                $_SESSION['message'] = "Le dossier médical a été créé avec succès .";
                header("Location: index.php?action=list"); // or wherever you list patients
                exit;
            } else {
                include 'views/patient/dossierMedical/create_dossier.php';
            }
        }
        

        public function deleteDossierAction()
          {
            $id = $_GET['id'];
            $nom_complet = $_GET['nom_complet'];
            $patient_id = $_GET['patient_id'];
            require_once 'views/patient/dossierMedical/delete_dossier.php';
          }

        public function destroyDossierAction($id)
          {
            $patient_id = $_GET['patient_id'];
            Dossier::destroyDossier($id);
            user::destroyUser($id);
            $_SESSION['message'] = "Le Dossier avec l'ID <strong>$id</strong> a été bien supprimé.";
            header("Location: index.php?action=dossierMedical&id=". $patient_id);
            exit;
          } 
 




  }


