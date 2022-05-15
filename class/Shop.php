<?php

Class Shop {
    private $db;
    
    public function __construct ($conn) {  
    
        $this->db = $conn;  
    }

    public function buyShop($user_id, $item_id) { 

        $stmt = $this->db->prepare("INSERT INTO shop_order (user_id, item_id) VALUES (:user_id, :item_id)");
       
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':item_id', $item_id);

        if($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }
    }

    public function getName($shop_id) { 

        $sth = $this->db->prepare('SELECT name FROM shop WHERE id = ?');

        $sth->execute([$shop_id]);
        
        $tab = $sth->fetchAll();


        if($tab) {
            return $tab[0]['name'];
        } else {
            return $stmt->error;
        }
    }

}

?>