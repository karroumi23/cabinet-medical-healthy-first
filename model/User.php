
    <?php
         require_once 'services/Database.php'; //connection with database

    class User {


        public static function getAll()
        {
            $pdo = Database::connect();  
          return $pdo->query('SELECT * FROM USERS ORDER BY id DESC')->fetchAll(PDO::FETCH_OBJ);
          
        }
         //private static You can call the method directly on the class ( User::findByUsername() )
        public static function findByUsername($username) 
        {
            $pdo = Database::connect();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            return $stmt->fetchObject();
        }

        public static function existsByUsername($username)
        {
           $pdo = Database::connect();
           $sqlState = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
           $sqlState->execute([$username]);
           $count = $sqlState->fetchColumn();

         return $count > 0;
        }

        public static function createUser($username, $password, $role)
        {
            $pdo = Database::connect();
            $sqlState = $pdo->prepare("INSERT INTO users (id, username, password, role, date_creation)
                                      VALUES (NULL, ?, ?, ?, DEFAULT)");
            $sqlState->execute([$username, $password, $role]);
        }

        public static function updateUser($id,$username,$password, $role)
          {
            $pdo = Database::connect();
            $sqlState = $pdo->prepare("UPDATE users SET username = ? , password = ? , role = ?  WHERE id = ?");
           return $sqlState->execute([$username,$password ,$role, $id]);
          }



        public static function destroyUser($id)
        {
           $pdo = Database::connect();
           $sqlState =$pdo->prepare("DELETE FROM users WHERE id=?" );
           return $sqlState->execute([$id]);
        }




        public static function viewUser($id) //$id from controller 
        {
          $pdo = Database::connect();
          $sqlState = $pdo->prepare('SELECT * FROM users WHERE id=?');
          $sqlState->execute([$id]);
          return $sqlState->fetch(PDO::FETCH_OBJ); 
        } 
  
    }
    

?>
