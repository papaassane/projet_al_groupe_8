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
		<div class="container site">
         <h1 class="text-logo"><span class = "glyphicon glyphicon-book"></span> News Code <span class = "glyphicon glyphicon-book"></span></h1>
			<!--Pour la barre de navigation-->
			
			<?php
				require 'database.php';
				echo '<nav>
					 	<ul class="nav nav-pills">';
				$db = Database::connect();
				$statement = $db->query('SELECT * FROM categories');
				
				$categories = $statement->fetchAll();
				foreach($categories as $category)
				{
					if($category['id'] == '1')
					{
						echo '<li role="presentation" class="active"><a href="#'.$category['id'].'" data-toggle="tab">'.$category['name'].'</a></li>' ;
					}else
					{
						echo '<li role="presentation" ><a href="#'.$category['id'].'" data-toggle="tab">'.$category['name'].'</a></li>' ;
					}
				}
				echo '</ul>
					</nav>';
			
				echo '<div class="tab-content">';
				// pour les menus 
				foreach($categories as $category)
				{
					if($category['id'] == '1')
					{
						echo '<div class="tab-pane active" id="' .$category['id'] . '">' ;
					}else
					{
						echo '<div class="tab-pane" id="' .$category['id'] . '">' ;
					}
					
					echo '<div class="row">';
					
					//selection tous les items qui ont un categories spécifique
					$statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id']));
					
					//maintenent on s'occupe de chaque item
					while($item = $statement->fetch())
					{
						 echo '<div class="col-sm">
                                <div class="thumbnail">
                                    <img src="images/' . $item['image'] . '" alt="...">
                                    <div class="price">' . number_format($item['price'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $item['name'] . '</h4>
                                        <p>' . $item['description'] . '</p>
                                        <a href='.$item['liens'].'  title ="Pour plus information"class="btn btn-order" role="button">VOIR <span class="glyphicon glyphicon-plus"></span> </a>
                                    </div>
                                </div>
                            </div>';
					}
					echo '</div>
                     </div>';
				}
				 Database::disconnect();
                 echo  '</div>';
				
			?>
						
						
			</div>
	</body>
</html>