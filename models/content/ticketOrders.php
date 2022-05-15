<?php

session_start();
require_once('../../config/database.php');

if (isset($_SESSION['user_id'])) 
{

    $records = $conn->query('SELECT * FROM ticket_order where statut=0');
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Sign in - Progressus Bootstrap template</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="../assets/css/main.css">

    <script>
        function confirmOrder(e){
            e.preventDefault();
            const modal = e.target.parentNode.parentNode;
            const id = modal.getElementsByTagName('div')[1].firstElementChild.firstElementChild.children[1].value;
            console.log(id);
            fetch("content/operationBD/updateTicketOrder.php", {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    id
                }),
            });
            alert('Update success!');
            location.reload();

        }
    </script>

</head>

<body>
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Ticket</th>
                <th scope="col">Date order</th>
                <th scope="col">Manage Informations</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // var_dump($donnees = $records->fetch());
                    $url = "\'content/submissionUser.php\'";
                    
                    while($donnees = $records->fetch()){

                        print('<tr>');

                        print('<th>'); print($donnees['id'] ."\n"); print('</th>');
                        print('<td>'); print($donnees['user_id'] ."\n");  print('</td>');
                        print('<td>'); print($donnees['ticket_id'] ."\n"); print('</td>');
                        print('<td>'); print($donnees['date_order'] ."\n"); print('</td>');

                        print('<td>');
                            print('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$donnees['id'] .'" onclick="(e => {
                                const element = document.getElementById(\'content\');
                                const div = document.createElement(\'div\');
                                const modal = `
                                <div class=\'modal fade\' id=\'exampleModal'.$donnees['id'] .'\' tabindex=\'-1\' aria-labelledby=\'exampleModalLabel\'>
                                <div class=\'modal-dialog\'>
                                  <div class=\'modal-content\'>
                                    <div class=\'modal-header\'>
                                      <h5 class=\'modal-title\' id=\'exampleModalLabel\'>Modal title</h5>
                                    </div>
                                    <div class=\'modal-body\'>
                                    <form>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword5\' class=\'form-label\'> ID </label>
                                            <input readonly type=\'text\' name=\'id\' class=\'form-control\' id=\'id\' value=\'' . $donnees['id'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword6\' class=\'form-label\'> User </label>
                                            <input type=\'text\' name=\'firstname\' class=\'form-control\' id=\'firstname\' value=\'' . $donnees['user_id'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword7\' class=\'form-label\'> Ticket order </label>
                                            <input type=\'text\' name=\'lastname\' class=\'form-control\' id=\'lastname\' value=\'' . $donnees['ticket_id'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword8\' class=\'form-label\'> Date order </label>
                                            <input type=\'text\' name=\'email\' class=\'form-control\' id=\'email\' value=\'' . $donnees['date_order'] . '\' disabled >
                                        </div>
                                        <br>
                                    </form>
                                    </div>
                                    <div class=\'modal-footer\'>

                                        <button type=\'button\' class=\'btn btn-secondary\' data-dismiss=\'modal\'>Close</button>
                                        <button type=\'button\'  class=\'btn btn-success\' onclick=\'confirmOrder(event)\'>Confirm order</button>
                                    </div>
                                  </div>
                                </div>
                              </div>`;
                                div.innerHTML = modal;
                                console.log(div.firstElementChild);
                                element.appendChild(div.firstElementChild);

                                console.log(\'manageuser\');
                            })()">');

                                print('Manage Order');
                            print('</button>');

                        print('</td>');

                        print('</tr>');
                    }
                    $records->closeCursor();      
                ?> 
            </tbody>
        </table>
    </div>
</body>
</html>