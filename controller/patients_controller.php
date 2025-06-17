<?php
  class PatientController {

     public function homeAction()
      {
        require_once 'views/home.php';
      }
    
     public function indexAction() //LISTE PATIENTS 
      {
        $patients = Patient::getAll();     
          // dossier status (there is dossier_M or not )
         foreach ($patients as $p) {
              $p->has_dossier = !empty(Dossier::getDossier($p->id));
           }
         require_once 'views/patient/liste_patients.php';
      }
       
      public function createAction()
       {
         require_once 'views/patient/create.php';
       }
      public function storeAction() 
       {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $cree_par = $_SESSION['user']['username']; //Get the username
              Patient::create($_POST['nom'],
                           $_POST['prenom'],
                           $_POST['age'],
                           $_POST['genre'], 
                           $_POST['numero_securite_sociale'],
                           $_POST['tel'],
                           $_POST['adresse'],
                           $cree_par);
           $_SESSION['message'] = "Le patient a été bien ajouter ."; //dispay in list patient pg                
            header('location:index.php?action=list');
          } else {
            include 'views/patient/create.php';
          }
       }
      
      public function editAction()
       {
        $id = $_GET['id'];
        $p = Patient::view($id) ; //recuperation info de patient from datB(nom/age...)
        require_once 'views/patient/edit.php';
       } 

       public function updateAction()
       {
           $id = $_POST['id'];
           $nom = $_POST['nom'];
           $prenom = $_POST['prenom'];
           $age = $_POST['age'];
           $genre = $_POST['genre'];
           $numero_securite_sociale = $_POST['numero_securite_sociale'];
           $tel = $_POST['tel'];
           $adresse = $_POST['adresse'];
       
           // Call update from moddel 
           Patient::update($id, $nom, $prenom, $age, $genre, $numero_securite_sociale, $tel, $adresse);
       
           $_SESSION['message'] = "Patient modifié avec succès.";
           header("Location: index.php?action=list");
           exit;
       }
       

      public function destroyAction($id)
      {
          Patient::destroy($id); // ID provenant de la liste des patients
          $_SESSION['message'] = "Le patient avec l'ID <strong>$id</strong> a été bien supprimé.";
          header('Location: index.php?action=list');
          exit;
      }
      
  }     
