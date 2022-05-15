<?php

session_start();
require_once('../../config/database.php');

if (isset($_SESSION['user_id'])) 
{
    if(isset($_SESSION['statut'])):
        if(((int) $_SESSION['statut']) != 1 ):
            header("Location: ../../index.php");
            exit();
        endif;
    endif;

    $records = $conn->query('SELECT * FROM animal');
    
}
?>



    <script>
        function submit(e){
            e.preventDefault();
            // console.log(e.target.parentNode.parentNode);
            const modal = e.target.parentNode.parentNode;
            const id = modal.getElementsByTagName('div')[1].firstElementChild.children[2].children[1].value;
            const name = modal.getElementsByTagName('div')[1].firstElementChild.children[4].children[1].value;
            const categories = modal.getElementsByTagName('div')[1].firstElementChild.children[6].children[1].value;
            const imgURL = modal.getElementsByTagName('div')[1].firstElementChild.children[8].children[1].value;
            const idElement = document.getElementById(id);

            console.log(name);
            console.log(e.target);
            fetch("content/operationBD/updateAnimal.php", {
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    name,
                    categories,
                    imgURL,
                    id
                }),
            });
            alert('Updated success!');
            location.reload();

        }

        
        function deleteAnimal(e){
            e.preventDefault();
            const modal = e.target.parentNode.parentNode;
            const id = modal.getElementsByTagName('div')[1].firstElementChild.children[2].children[1].value;
            console.log(id);
            fetch("content/operationBD/deleteAnimal.php", {
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
        function addAnimal(e){
            e.preventDefault();
            // console.log(e.target.parentNode.parentNode);
            const modal = e.target.parentNode.parentNode;
            // const id = modal.getElementsByTagName('div')[1].firstElementChild.children[2].children[1].value;
            const name = modal.getElementsByTagName('div')[1].firstElementChild.children[1].children[1].value;
            const description = modal.getElementsByTagName('div')[1].firstElementChild.children[3].children[1].value;
            const categories = modal.getElementsByTagName('div')[1].firstElementChild.children[5].children[1].children[0].value;
            const imgURL = modal.getElementsByTagName('div')[1].firstElementChild.children[7].children[1].value;

            // const idElement = document.getElementById(id);
            // console.log(e.target);
            fetch("content/operationBD/addUser.php", {
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    name,
                    description,
                    categories,
                    imgURL
                }),
            });
            alert('Add success!');
            location.reload();

        }
    </script>

<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        New Animal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add animal</h5>
        </div>
        <div class="modal-body">
            <form>
                <br>
                <div class="mb-3">
                    <label for="inputPassword6" class="form-label"> Name </label>
                    <input type="text" name="firstname" class=form-control id="nameAnimal" >
                </div>
                <br>
                <div class="mb-3">
                    <label for="inputPassword6" class="form-label"> Description </label>
                    <input type="text" name="description" class=form-control id="descriptionAnimal">
                </div>
                <br>
                <div class="mb-3">
                    <label for=inputPassword7 class="form-label"> Categorie </label>
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option value="1" selected>Aquatic</option>
                                <option value="2">Forest</option>
                                <option value="3">Mountain</option>
                                <option value="4">Savana</option>
                            </select>

                        </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="inputPassword7" class="form-label"> Image URL </label>
                    <input type="text" name="imageURL" class="form-control" id="imageURLAnimal" >
                </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" onclick="addAnimal(event)" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    <br/>
    <br/>

    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Icon</th>
                <th scope="col">Categorie</th>
                <th scope="col">Manage Informations</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                    // var_dump($donnees = $records->fetch());
                    $url = "\'content/submissionUser.php\'";

					// $records = $conn->query('SELECT * FROM animal');

                    while($donnees = $records->fetch()){

                        print('<tr>');

                        print('<th>'); print($donnees['id'] ."\n"); print('</th>');
                        print('<td>'); print($donnees['name'] ."\n");  print('</td>');
                        print('<td>'); print('<img src="'. $donnees['imgURL'] .'" class="img-thumbnail" alt="..." style="max-width:7%;max-height:5%;">'); print('</td>');

                        print('<td>'); print($donnees['category_id'] ."\n"); print('</td>');

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
                                        <img src=\'' . $donnees['imgURL'] . '\' class=\'img-thumbnail\' alt=\'...\' style=\'max-width:20%;\'>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword5\' class=\'form-label\'> ID </label>
                                            <input readonly type=\'text\' name=\'id\' class=\'form-control\' id=\'id\' value=\'' . $donnees['id'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword6\' class=\'form-label\'> Name </label>
                                            <input type=\'text\' name=\'firstname\' class=\'form-control\' id=\'name\' value=\'' . $donnees['name'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword7\' class=\'form-label\'> Categorie </label>
                                            <input type=\'text\' name=\'lastname\' class=\'form-control\' id=\'category\' value=\'' . $donnees['category_id'] . '\' >
                                        </div>
                                        <br>
                                        <div class=\'mb-3\'>
                                            <label for=\'inputPassword7\' class=\'form-label\'> Image URL </label>
                                            <input type=\'text\' name=\'imageURL\' class=\'form-control\' id=\'imageURL\' value=\'' . $donnees['imgURL'] . '\' >
                                        </div>
                                        
                                    </form>
                                    </div>
                                    <div class=\'modal-footer\'>
                                        <button type=\'button\'  class=\'btn btn-warning pull-left\' onclick=\'deleteAnimal(event)\'>Delete Animal</button>

                                        <button type=\'button\' class=\'btn btn-secondary\' data-dismiss=\'modal\'>Close</button>
                                        <button type=\'button\'  class=\'btn btn-success\' onclick=\'submit(event)\'>Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>`;
                                div.innerHTML = modal;
                                console.log(div.firstElementChild);
                                element.appendChild(div.firstElementChild);

                            })()">');

                                print('Manage Animal');
                            print('</button>');

                        print('</td>');


                        print('</tr>');
                    }
                    $records->closeCursor();      
                ?> 
            </tbody>
        </table>
    </div>
