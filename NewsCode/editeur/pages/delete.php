<?php
	require 'database.php';

	//pour le premier passage
	if(!empty($_GET['id']))
	{
		$id =  checkInput($_GET['id']);
	}
	
	//lors du deuxième passage
	if(!empty($_POST))
	{
		$id = checkInput($_POST['id']);
		$db = Database::connect();
		$statement = $db->prepare("DELETE FROM items WHERE id = ?");
		$statement->execute(array($id));
		Database::disconnect();
		header("location: index.php");
	}

	//pour la sécurité 
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>News Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body>
         <h1 class="text-logo"><span class = "glyphicon glyphicon-book"></span> News Code <span class = "glyphicon glyphicon-book"></span></h1>
         <div class="container admin">
            <div class="row">
                    <h1><strong>Supprimer un item</strong></h1>
                    <br>
                    <form class="form" role="form"	action="delete.php" method="post">
						<!--on vas le mettre dans un formulaire qui ne sera pas visible(hidden) -->
                     	<input type="hidden" name="id" value="<?php echo $id;?>"/>
						<p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
						<div class="form-actions">
							<button type="submit" class="btn btn-warning">OUI</button>
							<a class="btn btn-default" href="index.php">NON</a>
						</div>
				</form>
            </div>
        </div>   
    </body>
</html>

