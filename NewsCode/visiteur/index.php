<?php
	require 'database.php';
	
	//pour la première fois les variables sont initialisés à  0
	$pseudoError = $pseudo = $password = $passwordError = "";
	
	//pour la deuxième fois en clickant sur le bouton ajouter 
	//avec la méthode post

	//demande si la super variable post est vide 
	if(!empty($_POST))
	{
		//on l'ai rempli avec le contenu du formulaire 
		$pseudo = 			checkInput($_POST['$pseudo']);
		$password = 		checkInput($_POST['password']);
		
		//pour savoir si on a rempli le formulaire avec success
		$isSuccess = 		true;
		
		if(empty($pseudo))
		{
			 $pseudoError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($password)) 
        {
            $password = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

		//si c'est un success on ajoute l'élément
		if($isSuccess)
		{
			//se connecter à la base de donnée 
			$db = Database::connect();
			//on prépare la requete sql
            $statement = $db->prepare("INSERT INTO items (name,description,price,category,image) values(?, ?, ?, ?, ?)");
			//exécuter la requête sql
            $statement->execute(array($name,$description,$price,$category,$image));
			//se déconnecter à la base de donnée 
            Database::disconnect();
			//permet de quitter et d'aller à la page index.php
            header("Location: index.php");
		}
		
		
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
        <h1 class="text-logo"> News Code </h1>
         <div class="container admin">
            <div class="row">
                    <h1><strong>Connexion</strong></h1>
                    <br>
                    <form class="form" role="form"	action="insert.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
							<label for="name">Pseudo:</label> 
							<input type="text" class="form-control" id="name" name="name",placeholder="Nom" value="<?php echo $pseudo; ?>">
							<span class="help-inline"><?php echo $pseudoError; ?> </span>
                      </div>
                      <div class="form-group">
						  	<label for="description">Password:</label>
							<input type="text" class="form-control" id="description" name="description",placeholder="Description" value="<?php echo $password; ?>">
							<span class="help-inline"><?php echo $passwordError; ?> </span>
                      </div>
                     
                      
                    
                    <br>
                    <div class="form-actions">
                      	<a class="btn btn-primary" href="../visiteur/pages/index.php"><span class="glyphicon glyphicon-arrow-left"></span> Connexion</a>
                    </div>
				</form>
            </div>
        </div>   
    </body>
</html>

