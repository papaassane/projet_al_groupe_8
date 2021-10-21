<?php
	require 'database.php';
	
	//pour la première fois les variables sont initialisés à  0
	$first_nameError= $last_nameError = $pseudoError = $passwordError = $emailError = $profilError = $first_name = $last_name = $pseudo = $password = $email = $profil = "";
	
	//pour la deuxième fois en clickant sur le bouton ajouter 
	//avec la méthode post

	//demande si la super variable post est vide 
	if(!empty($_POST))
	{
		//on l'ai rempli avec le contenu du formulaire 
		$first_name = 			checkInput($_POST['first_name']);
		$last_name = 		checkInput($_POST['last_name']);
		$pseudo = 			checkInput($_POST['pseudo']);
		$password = 		checkInput($_POST['password']);
		$email = 		    checkInput($_POST['email']);
		$profil = 		    checkInput($_POST['profil']);

		$isSuccess = 		true;
		
		if(empty($first_name))
		{
			 $first_nameError = 'Ce champ ne peut pas être vide';
             $isSuccess = false;
        }
        if(empty($last_name)) 
        {
            $last_nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($pseudo)) 
        {
            $pseudoError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($password)) 
        {
            $passwordError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($email)) 
        {
            $emailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($profil)) 
        {
            $profilError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		//si c'est un success on ajoute l'élément
		if($isSuccess )
		{
			//se connecter à la base de donnée 
			$db = Database::connect();
			//on prépare la requete sql
            $statement = $db->prepare("INSERT INTO users (first_name,last_name,pseudo,password,email,profil) values(?, ?, ?, ?, ?, ?)");
			//exécuter la requête sql
            $statement->execute(array($first_name,$last_name,$pseudo,$password,$email,$profil));
			//se déconnecter à la base de donnée 
            Database::disconnect();
			//permet de quitter et d'aller à la page index.php
            header("Location: index.php");
		}
		
		
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
                    <h1><strong>Ajouter un utilisateur</strong></h1>
                    <br>
                    <form class="form" role="form"	action="insert.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
							<label for="first_name">Prénom:</label> 
							<input type="text" class="form-control" id="first_name" name="first_name",placeholder="Prenom" value="<?php echo $first_name; ?>">
							<span class="help-inline"><?php echo $first_nameError; ?> </span>
                      </div>
                      <div class="form-group">
						  	<label for="last_name">Nom:</label>
							<input type="text" class="form-control" id="last_name" name="last_name",placeholder="Nom" value="<?php echo $last_name; ?>">
							<span class="help-inline"><?php echo $last_nameError; ?> </span>
                      </div>
                      
					  <div class="form-group">
						  	<label for="pseudo">Pseudo:</label>
							<input type="text" class="form-control" id="pseudo" name="pseudo",placeholder="Nom" value="<?php echo $pseudo; ?>">
							<span class="help-inline"><?php echo $pseudoError; ?> </span>
                      </div>
					 
					  <div class="form-group">
						  	<label for="profil">Profil:</label>
							<input type="text" class="form-control" id="profil" name="profil",placeholder="Profil" value="<?php echo $profil; ?>">
							<span class="help-inline"><?php echo $profilError; ?> </span>
                      </div>

					  <div class="form-group">
						  	<label for="password">Password:</label>
							<input type="text" class="form-control" id="password" name="password",placeholder="Password" value="<?php echo $password; ?>">
							<span class="help-inline"><?php echo $passwordError; ?> </span>
                      </div>
                      
					  <div class="form-group">
						  	<label for="email">Email:</label>
							<input type="text" class="form-control" id="email" name="email",placeholder="Email" value="<?php echo $email; ?>">
							<span class="help-inline"><?php echo $emailError; ?> </span>
                      </div>
                    
                    <br>
                    <div class="form-actions">
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                      	<a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
				</form>
            </div>
        </div>   
    </body>
</html>

