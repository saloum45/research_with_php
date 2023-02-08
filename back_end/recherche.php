<?php
    try{
        $conn = new PDO('mysql:host=localhost;dbname=test;','root','');
        if(isset($_GET['q'])){
            $q = $_GET['q'];
            $s = explode(" ", $q);
            $select = $conn->prepare("SELECT * FROM produit WHERE nom LIKE '%$q%' ");
            $select->execute();
            $affichages = $select->fetchAll();
        }else{
            echo "pas trouver ressayer avec un orthographe different";
        }
        
    }catch(PDOException $e){
        echo "la connection a echoue" . $e->getMessage();
        
    }
        

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recherche</title>
</head>
<body>
    <form action="recherche.php" method="get">
        <label for="q">rechercher</label>
        <input type="text" name="q" id="q">
        <input type="submit" value="rechercher"> 

    </form>
    <?php foreach ($affichages as $affichage): ?>
        <h1><?php echo $affichage['nom'] ?></h1>
        <p><?php echo $affichage['descriptions'] ?></p>

    <?php endforeach?>
    
    
</body>
</html>