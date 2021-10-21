<?php
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
	//pour se connecter à la base de donnée
    $db = Database::connect();
	//pour preparer la requête SQL
    $statement = $db->prepare("SELECT users.id, users.first_name, users.last_name, users.pseudo,users.password, users.email,users.profil FROM users");
	//pour exécuter la requête SQL
    $statement->execute(array($id));
	//pour afficher la première ligne  et on le met dans la variable item
    $user = $statement->fetch();
	//pour se déconnecter à la base de donnée 
    Database::disconnect();

	//pour la sécurité 
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!--pour la décoration html -->

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
                    <h1><strong>Voir un utilisateur</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Prénom:</label><?php echo '  '.$user['first_name'];?>
                      </div>
                      <div class="form-group">
                        <label>Nom:</label><?php echo '  '.$user['last_name'];?>
                      </div>
					  <div class="form-group">
                        <label>Pseudo:</label><?php echo '  '.$user['pseudo'];?>
                      </div>
                      <div class="form-group">
                        <label>Password:</label><?php echo '  '.$user['password'];?>
                      </div>
					  <div class="form-group">
                        <label>Email:</label><?php echo '  '.$user['email'];?>
                      </div>
					  <div class="form-group">
                        <label>Profil:</label><?php echo '  '.$user['profil'];?>
                      </div>
                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </div> 
                
            </div>
        </div>   
    </body>
</html>

