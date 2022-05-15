<?php
	session_start();
	require_once('../../config/database.php');

	$records = $conn->query('SELECT * FROM animal WHERE category_id=3');

?>

        <div class="row">
		<?php
				while($donnees = $records->fetch()) {
					print('<div class="col-sm-3 well-sm">');
						print('<div class="card" >');
							print('<div class="row text-center">');
								print('<img class="img-thumbnail" style="width:50%;height:50%;" src="'.$donnees['imgURL'] .'" alt="...">');
							print('</div>');							print('<div class="card-body">');
								print('<h5 class="card-title text-center">'.$donnees['name'] .'</h5>');
								print('<hr/>');
								print('<p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>');
								// print('<a href="#" class="btn btn-primary">Go somewhere</a>');
							print('</div>');
						print('</div>');
					print('</div>');
				}
			?>
		</div>
