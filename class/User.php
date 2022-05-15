<?php

Class User {
    
    private $db;
    
    public function __construct ($conn) {  
    
        $this->db = $conn;  
        
    }

    
    //Rgister new user within database
    public function register($firstname, $lastname, $email, $pass) {  
    

        $stmt = $this->db->prepare("INSERT INTO user (firstname, lastname, email, pass) VALUES (:firstname, :lastname, :email, :pass)");
       
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $password = password_hash($pass, PASSWORD_BCRYPT);
        $stmt->bindParam(':pass', $password);


        if($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }
          
    }
    
    //Look for existing user in database
    public function login($email, $pass) {
        
        //Query database for info based on username or email
        $records = $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if(password_verify($pass, $results['pass'])){

            $_SESSION['user_id'] = $results["id"];
            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $results["firstname"];
            $_SESSION['lastname'] = $results["lastname"];
            $_SESSION['statut'] = $results["right"];

            return true;

        } else {
            return 'Wrong password';
        } 
    }

    public function getFirstname($user_id) {  
    

        $sth = $this->db->prepare('SELECT firstname FROM user WHERE id = ?');

        $sth->execute([$user_id]);
        
        $tab = $sth->fetchAll();

        if($tab) {
            return $tab[0]['firstname'];
        } else {
            return $stmt->error;
        }
          
    }

    public function getLastname($user_id) {  
    

        $sth = $this->db->prepare('SELECT lastname FROM user WHERE id = ?');

        $sth->execute([$user_id]);
        
        $tab = $sth->fetchAll();

        if($tab) {
            return $tab[0]['lastname'];
        } else {
            return $stmt->error;
        }
          
    }
    
    //Check if user is logged in
    public function isLoggedIn() {
        
        //Return true if session has been set, false if it hasn't
        if(isset($_SESSION['userLoginStatus'])) {
            return true;
        } else {
            return false;
        }
        
    }
    
    //Redirect to a different page
    public function redirect($url) {
        header("Location: $url");
    }
    
    public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
    }
 
}

?>