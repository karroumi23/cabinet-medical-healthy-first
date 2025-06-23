<?php
    require_once 'services/Database.php';


  class Patient {    
    
   

        //'private static' You can call the method directly on the class (Patient::getAll())
      public static function getAll($search = '') // $search or 'empty string'
        {
            $pdo = Database::connect();
        
            if ($search !== '') {
                $sql = "SELECT * FROM patients WHERE nom LIKE :search OR prenom LIKE :search ORDER BY id DESC";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':search' => '%' . $search . '%']);
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                return $pdo->query('SELECT * FROM patients ORDER BY id DESC')->fetchAll(PDO::FETCH_OBJ);
            }
        }

      public static function create($nom, $prenom, $age, $genre, $numero_securite_sociale, $tel, $adresse, $cree_par)
      {
          $pdo = Database::connect();
          $sqlState = $pdo->prepare("INSERT INTO patients (id, nom, prenom, age, genre, numero_securite_sociale, tel, adresse, date_ajout, cree_par)
                                    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, DEFAULT, ?)"); 
          $sqlState->execute([$nom, $prenom, $age, $genre, $numero_securite_sociale, $tel, $adresse,$cree_par]);
          
      }
      

      public static function update($id, $nom, $prenom, $age, $genre, $numero_securite_sociale, $tel, $adresse)
       {
            $pdo = Database::connect();
            $sqlState = $pdo->prepare("UPDATE patients SET nom = ?, prenom = ?, age = ?, genre = ?, numero_securite_sociale = ?, tel = ?, adresse = ?  WHERE id = ?");
          return $sqlState->execute([$nom, $prenom, $age, $genre, $numero_securite_sociale, $tel, $adresse, $id]);
       }
      

      public static function destroy($id)
      {
        $pdo = Database::connect();
        $sqlState =$pdo->prepare("DELETE FROM patients WHERE id=?" );
        return $sqlState->execute([$id]);
      }





      public static function view($id) //$id from controller 
      {
        $pdo = Database::connect();
        $sqlState = $pdo->prepare('SELECT * FROM patients WHERE id=?');
        $sqlState->execute([$id]);
        return $sqlState->fetch(PDO::FETCH_OBJ); 
      } 



  }
?>