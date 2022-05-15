<?php
    session_start();
    require_once('../../config/database.php');
    
    $sql = "SELECT id, author FROM issue where statut=0";
    $result = $conn->query($sql);

        print('<select id="issues" onchange="myFunction()" name="issue">');
        print('<option value="" selected> Choose an issue</option>');


        while($lignes=$result->fetch(PDO::FETCH_OBJ)) {
            print('<option value=' . $lignes->id.'> ' .  $lignes->id.'</option>'); 


            
        }

        print('</select>');
        print('<br/>');

        



?>

<div id="contentIssues"></div>

    

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    function myFunction(){
        // $('#issues').change(function () {

            var id = document.getElementById('issues').value;

            $.ajax({
                type: 'POST',
                url: 'content/operationBD/getData.php',
                data: {
                    id : id,
                },
                success: function (response) {
                    $('#contentIssues').html(response);
                }
            });

            
        // });
    }

</script>
