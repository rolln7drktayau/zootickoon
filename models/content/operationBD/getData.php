

<?php

require_once('../../../config/database.php');


    $id = $_POST['id']; 
    
    $sql = "SELECT id, description, author, date_issue from issue where id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);

    while($row = $stmt->fetch(PDO::FETCH_OBJ))
    {
        print('<form id="issue">');

            print('<div class="mb-3">');
                print('<label for="exampleInputEmail1" class="form-label">Id</label>');
                print('<input type="text" id="idIssue" name="idIssue" class="form-control" value="'.$row->id.'" disabled>');
            print('</div>');
            print('<br/>');
            print('<div class="mb-3">');
                print('<label for="exampleInputEmail1" class="form-label">Author</label>');
                print('<input type="text" class="form-control" value="'.$row->author.'" disabled>');
            print('</div>');
            print('<br/>');
            print('<div class="mb-3">');
                print('<label for="exampleInputEmail1" class="form-label">Description</label>');
                print('<textarea placeholder="Type your message here..." name="description" class="form-control" rows="5" disabled>'.$row->description.'</textarea>');
            print('</div>');
            print('<br/>');

            print('<div class="mb-3">');
                print('<label for="exampleInputEmail1" class="form-label">Description</label>');
                print('<textarea placeholder="Type your message here..." name="description" class="form-control" rows="5" disabled>'.$row->description.'</textarea>');
            print('</div>');
            print('<br/>');

            print('<div class="mb-3">');
                print('<label for="exampleInputEmail1" class="form-label">Author</label>');
                print('<input type="text" class="form-control" value="'.$row->date_issue.'" disabled>');
            print('</div>');
            print('<br/>');

            print('<button type="submit" name="submit" class="btn btn-primary">'); print('Resolve'); print('</button>');

        print('</form>');

    }

?>


<script>
    $("form").on( "submit", function(e) {
        var id = $("#idIssue").val();
        $.ajax({
            type: 'POST',
            url: 'content/operationBD/process.php',
            data: {
                id,
            },
            success: function() {
                $('#issue').html("<div id='message'></div>");
                $('#message').html("<h2>Contact Form Submitted!</h2>")
                .append("<p>We will be in touch soon.</p>")
                .hide()
                .fadeIn(1500, function() {
                    $('#message').append("<img id='checkmark' src='images/check.png' />");
                });
            }
        });
        return false;
    
    });


</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

