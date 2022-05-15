<?php

session_start();
require_once('../../config/database.php');

if (isset($_SESSION['user_id'])) 
{

    $records = $conn->query('SELECT * FROM user order by id');
    
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
        function submit(e){
            e.preventDefault();
            // console.log(e.target.parentNode.parentNode);
            const modal = e.target.parentNode.parentNode;
            const id = modal.getElementsByTagName('div')[1].firstElementChild.firstElementChild.children[1].value;
            const firstname = modal.getElementsByTagName('div')[1].firstElementChild.children[2].children[1].value;

            const lastname = modal.getElementsByTagName('div')[1].firstElementChild.children[4].children[1].value;
            const email = modal.getElementsByTagName('div')[1].firstElementChild.children[6].children[1].value;

            // const idElement = document.getElementById(id);
            // console.log(e.target);
            fetch("content/operationBD/updateUser.php", {
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    firstname,
                    lastname,
                    email,
                    id
                }),
            });
            alert('Updated success!');
            location.reload();

        }

        
        function deleteUser(e){
            e.preventDefault();
            const modal = e.target.parentNode.parentNode;
            const id = modal.getElementsByTagName('div')[1].firstElementChild.firstElementChild.children[1].value;
            console.log(id);
            fetch("content/operationBD/deleteUser.php", {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    id
                }),
            });
            alert('Deleted success!');
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
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Creation</th>
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
                        print('<td>'); print($donnees['firstname'] ."\n");  print('</td>');
                        print('<td>'); print($donnees['lastname'] ."\n"); print('</td>');
                        print('<td>'); print($donnees['email'] ."\n"); print('</td>');
                        print('<td>'); print($donnees['date'] ."\n"); print('</td>');


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
                                            <label for=\'inputPassword6\' class=\'form-label\'> Firstname </label>
                                            <input type=\'text\' name=\'firstname\' class=\'form-control\' id=\'firstname\' value=\'' . $donnees['firstname'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword7\' class=\'form-label\'> Lastname </label>
                                            <input type=\'text\' name=\'lastname\' class=\'form-control\' id=\'lastname\' value=\'' . $donnees['lastname'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword8\' class=\'form-label\'> Email </label>
                                            <input type=\'text\' name=\'email\' class=\'form-control\' id=\'email\' value=\'' . $donnees['email'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword8\' class=\'form-label\'> Date </label>
                                            <input type=\'text\' name=\'date\' class=\'form-control\' id=\'date\' value=\'' . $donnees['date'] . '\' disabled >
                                        </div>
                                    </form>
                                    </div>
                                    <div class=\'modal-footer\'>
                                        <button type=\'button\'  class=\'btn btn-warning pull-left\' onclick=\'deleteUser(event)\'>Delete user</button>

                                        <button type=\'button\' class=\'btn btn-secondary\' data-dismiss=\'modal\'>Close</button>
                                        <button type=\'button\'  class=\'btn btn-success\' onclick=\'submit(event)\'>Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>`;
                                div.innerHTML = modal;
                                console.log(div.firstElementChild);
                                element.appendChild(div.firstElementChild);

                                console.log(\'manageuser\');
                            })()">');

                                print('Manage User');
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