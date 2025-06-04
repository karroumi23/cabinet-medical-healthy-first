<?php 

class AuthController {

   public function showLogincAtion()
    {
      require_once'views/authentification/show_login.php';
    }

    public function login() 
     {  
         $user = User::findByUsername($_POST['username']); 
         if ($user && password_verify($_POST['password'], $user->password)) {
            $_SESSION['user'] = [
              'username' => $user->username,
              'role' => $user->role
              ];
          $_SESSION['message'] = "Bienvenue, " . htmlspecialchars($user->username) . "!";
          header('Location: index.php?action=home');
          exit;
      }
        else {
            $error = "Nom d'utilisateur ou mot de passe incorrect";
            require_once 'views/authentification/show_login.php';
        }
     }
    
     public function logout()
      {     
         session_destroy();
         header('Location: index.php?action=home');
         exit;
      }  
   
    public function listUsersAction()
     {
       $users = user::getAll();
       require_once 'views/user/liste_users.php';
     } 
    
    
     public function createUserAction()
       {
           require_once 'views/user/add_user.php';
       }
     
     public function  storeUserAction()
      {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];
          //hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          // Call model function to insert user
            User::createUser($username, $hashedPassword, $role);
            $_SESSION['message'] = "L'utilisateur $username a été bien ajouté.";
          //redirection
            header('Location: index.php?action=login');
            exit;  
         } else {
            // If not POST, redirect to form
            header('Location: index.php?action=createUser');
            exit;
        }

      }

    public function editUserAction()
      {
        $id = $_GET['id'];
        $u = user::viewUser($id) ; //recuperation info  user from datB(nom/role...)
        require_once 'views/user/edit_user.php';
      }
    public function updateUserAction()
      {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];
         user::updateUser($id,$username,$password, $role);
         $_SESSION['message'] = "utilisateur avec l'ID <strong>$id</strong> modifié avec succès.";
         header("Location: index.php?action=listUsers");
         exit;
      }  


    public function destroyUserAction($id)
      {
         user::destroyUser($id);
         $_SESSION['message'] = "Le utilisateur avec l'ID <strong>$id</strong> a été bien supprimé.";
          header('Location: index.php?action=listUsers');
          exit;
      }





}


?>