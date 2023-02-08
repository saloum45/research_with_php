<?php
    try{
        $conn = new PDO('mysql:host=localhost;dbname=test;','root','');
        $select = $conn->prepare('SELECT * FROM produit');
        $select->execute();
        $affichages = $select->fetchAll();
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
    <!-- <h1>UAHB</h1>
    <p>Une université qui rassemble divérsité et rigueur au travail</p>
    <br>
    <h1>UVS</h1>
    <p>une université qui vous trouve là oû vous êtes (foo nekk fofou leu)</p>
    <br>
    <h1>IPM</h1>
    <p>une université marocaine qui rassemble deux culture (marocaine et senegalaise)</p> -->
    
</body>
</html>