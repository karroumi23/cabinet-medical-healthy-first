

<?php
require_once 'controller/patients_controller.php';
require_once 'controller/AuthController.php';
require_once 'controller/dossierController.php';
require_once 'model/patients.php';
require_once 'model/User.php';
require_once 'model/dossier.php';
session_start();

$controller = new PatientController();  //stocke-le dans la variable $controller afin de pouvoir utiliser ses méthodes."
$AuthController = new AuthController(); //stocke-le dans la variable $AuthController afin de pouvoir utiliser ses méthodes."
$dossierController = new dossierController();


  if(isset($_GET['action'])){  //example action come from (href="index.php?action=create" )
      $action = $_GET['action'];

      switch ($action) {
        //-------------------login
        case 'show':
          $AuthController->showLogincAtion();
            break;  
        case 'login':
              if ($_SERVER['REQUEST_METHOD'] === 'POST') { //checking what type of HTTP (post-get)
          $AuthController->login();
              } else {
                $AuthController->showLogincAtion();
              }
              break;
        case 'logout':
            $AuthController->logout();
              break; 
        //----------------------------user          
        case 'listUsers'  :
           $AuthController->listUsersAction();
              break; 
        case 'createUser':
            $AuthController->createUserAction();
              break;      
        //store user
        case 'storeUser'  :
           $AuthController->storeUserAction();
              break;       
        case 'editUser'  :
           $AuthController->editUserAction();
              break; 
        case 'updateUser' :
            $AuthController->updateUserAction();      
              break; 
        case 'destroyUser'  :
           $AuthController->destroyUserAction($_GET['id']);
              break;                             
      //------------------------------patient
        case 'home':
          $controller->homeAction();
            break;
        case 'list':
          $controller->indexAction();
            break;
        case 'create':
          $controller->createAction();
            break;   
        case 'store':
          $controller->storeAction();
            break;
        case 'edit' :
           $controller->editAction();
             break;  
        case 'update' :
           $controller->updateAction();
             break;          
        case 'destroy':
              if (isset($_GET['id'])) {
                $controller->destroyAction($_GET['id']);
              }
            break;   
            //*****export****/
        case 'export':
           $controller->exportAction();
            break; 
         
        //------------------------------dossier medical 
        case 'dossierMedical' : 
          if (isset($_GET['id'])) {
            $dossierController->dossierAction($_GET['id']); 
             }
              break;       
        case 'createDossier':
          if (isset($_GET['id'],$_GET['nom_complet'])) { 
             $dossierController->createDossierAction($_GET['id'],$_GET['nom_complet']);
           }
             break;   
        case 'storeDossier' : 
          $dossierController->storeDossierAction();
             break;
        case 'editDossier' : 
              $dossierController->editDossierAction();
              break;
        case 'updateDossier' :
             $dossierController->updateDossierAction();    
             break;     
        case 'deleteDossier' : 
              break;       
        case 'destroyDossier' : 
              $dossierController->destroyDossierAction($_GET['id'],$_GET['patient_id']); 
              break;   
        //*****export****/
        case 'exportDossier':
          if (isset($_GET['id'])) {
              $dossierController->exportDossierAction($_GET['id']);
          }
               break;
        case 'exportAllDossiers':
          if (isset($_GET['id'])) {
              $dossierController->exportAllDossiersAction($_GET['id']);
          }
               break;
                     
      }


}else{
     $controller-> homeAction();
}
?>


