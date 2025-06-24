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
                $patient_id = $_POST['patient_id'];
                // Call the model to insert the dossier
                Dossier::createDossier 
                         ($_POST['patient_id'],
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
                header("Location: index.php?action=dossierMedical&id=". $patient_id); // or wherever you list patients
                exit;
            } else {
                include 'views/patient/dossierMedical/create_dossier.php';
            }
        }
        

      public function editDossierAction()
        {
          $id = $_GET['id'];
          $d = Dossier::viewDossier($id); //recuperation info de dossier from datB(id/patient_id...)
          require_once 'views/patient/dossierMedical/edit_dossier.php';
        }  
      
      public function updateDossierAction()
        {
               $id = $_POST['id'];
               $patient_id = $_POST['patient_id'];
               $nom_complet = $_POST['nom_complet'];
               $groupe_sanguin = $_POST['groupe_sanguin'];
               $type_maladie = $_POST['type_maladie'];
               $diagnostic = $_POST['diagnostic'];
               $date_admission = $_POST['date_admission'];
               $date_fin_traitement = $_POST['date_fin_traitement'];
               $cout_traitement = $_POST['cout_traitement'];
               $acompte_cout = $_POST['acompte_cout'];
              
               Dossier::updateDossier($id,$patient_id, $nom_complet, $groupe_sanguin, $type_maladie, $diagnostic, $date_admission, $date_fin_traitement, $cout_traitement,$acompte_cout);
               $_SESSION['message'] = "Le dossier avec l'ID $id a été modifié avec succès.";
              header("Location: index.php?action=dossierMedical&id=". $patient_id);
           exit;
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
 
          //-------------------------------------------------------------export
        
          public function exportDossierAction($id)
          {
              // Get the dossier info
              $dossier = Dossier::viewDossier($id);
          
              if (!$dossier) {
                  $_SESSION['message'] = "Dossier introuvable.";
                  header("Location: index.php?action=dossierMedical&id=" . $_GET['patient_id']);
                  exit;
              }
          
              require_once __DIR__ . '/../vendor/autoload.php';
              $mpdf = new \Mpdf\Mpdf();
          
              // Pass data to the view
              $data = [
                  'dossier' => $dossier,
                  'isSingle' => true
              ];
          
              // Render the view
              $html = $this->renderView('patient/dossierMedical/pdf_dossier.php', $data);
          
              $mpdf->WriteHTML($html);
              $mpdf->Output("Dossier_".$dossier->id.".pdf", "D");
              exit;
          }


          public function exportAllDossiersAction($patient_id)
          {
              $dossiers = Dossier::getDossier($patient_id);
          
              if (empty($dossiers)) {
                  $_SESSION['message'] = "Aucun dossier à exporter.";
                  header("Location: index.php?action=dossierMedical&id=" . $patient_id);
                  exit;
              }
          
              require_once __DIR__ . '/../vendor/autoload.php';
              $mpdf = new \Mpdf\Mpdf();
          
              // Pass data to the view
              $data = [
                  'dossiers' => $dossiers,
                  'patient_id' => $patient_id,
                  'isSingle' => false
              ];
          
              // Render the view
              $html = $this->renderView('patient/dossierMedical/pdf_dossier.php', $data);
          
              $mpdf->WriteHTML($html);
              $mpdf->Output("Dossiers_Patient_".$patient_id.".pdf", "D");
              exit;
          }
          
          // Helper method to render views
          private function renderView($viewPath, $data = [])
          {
              extract($data);
              ob_start();
              include __DIR__ . '/../views/' . $viewPath;
              return ob_get_clean();
          }


  }


