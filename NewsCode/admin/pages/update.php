<?php

    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

					$first_name = $last_name = $pseudo = $password = $email = $profil = $first_nameError = $last_nameError = $pseudoError = $passwordError = $emailError = $profilError = "";

    if(!empty($_POST)) 
    {
        $first_name               = checkInput($_POST['first_name']);
        $last_name        = checkInput($_POST['last_name']);
        $pseudo              = checkInput($_POST['pseudo']);
        $password           = checkInput($_POST['password']);
		$email 				=  checkInput($_POST['email']);
        $profil 				=  checkInput($_POST['profil']);
        $isSuccess          = true;
       
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
            $passwordError = 'Ce champ ne peut pas être vide';
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

         
        if ($isSuccess ) 
        { 
            $db = Database::connect();
            
                $statement = $db->prepare("UPDATE users  set first_name = ?, last_name = ?, pseudo = ?, password = ?,email = ?, profil = ? WHERE id = ?");
                $statement->execute(array($first_name,$last_name,$pseudo,$password,$email,$profil,$id));

               
            }
            Database::disconnect();
            header("Location: index.php");
        }
       
    
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM users where id = ?");
        $statement->execute(array($id));
        $user = $statement->fetch();
        $first_name           = $user['first_name'];
        $last_name    = $user['last_name'];
        $pseudo          = $user['pseudo'];
        $password       = $user['password'];
		$email          = $user['email'];
        $profil          = $user['profil'];
        Database::disconnect();
    }

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
                <div class="col-sm-6">
                    <h1><strong>Modifier un utilisateur</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'update.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Prénom:
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Prenom" value="<?php echo $first_name;?>">
                            <span class="help-inline"><?php echo $first_nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="description">Nom:
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nom" value="<?php echo $last_name;?>">
                            <span class="help-inline"><?php echo $last_nameError;?></span>
                        </div>
                       
						<div class="form-group">
                            <label for="description">Pseudo:
                            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" value="<?php echo $pseudo;?>">
                            <span class="help-inline"><?php echo $pseudoError;?></span>
                        </div>


                        <div class="form-group">
						  	<label for="profil">Profil:</label>
							<input type="text" class="form-control" id="profil" name="profil",placeholder="Profil" value="<?php echo $profil; ?>">
							<span class="help-inline"><?php echo $profilError; ?> </span>
                      </div>
							
						<div class="form-group">
                            <label for="password">Password :
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password;?>">
                            <span class="help-inline"><?php echo $passwordError;?></span>
                        </div>
							
						<div class="form-group">
                            <label for="email">Email :
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email;?>">
                            <span class="help-inline"><?php echo $emailError;?></span>
                        </div>
                       
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
                
            </div>
        </div>   
    </body>
</html>