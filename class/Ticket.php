<?php

Class Ticket {
    private $db;
    
    public function __construct ($conn) {  
    
        $this->db = $conn;  
    }

    public function buyTicket($user_id, $ticket_id) { 

        $stmt = $this->db->prepare("INSERT INTO ticket_order (user_id, ticket_id) VALUES (:user_id, :ticket_id)");
       
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':ticket_id', $ticket_id);

        if($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }
    }

    public function getName($ticket_id) { 

        $sth = $this->db->prepare('SELECT name FROM ticket WHERE id = ?');

        $sth->execute([$ticket_id]);
        
        $tab = $sth->fetchAll();


        if($tab) {
            return $tab[0]['name'];
        } else {
            return $stmt->error;
        }
    }

}

?>