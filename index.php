<?php

include_once 'connexionBdd.php';

  //--------C du CRUD------------------------------------
  if(isset($_POST['inscription'])) {
    $username = $_POST['username'];
    $password = password_hash( $_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    

    $sqlC = "INSERT INTO `inscription`(`username`, `email`, `password`) VALUES (:username, :email, :password)"; //Requete en sql
    $request = $db->prepare($sqlC); // On prépare la requete
    $request->bindValue(":username", $username, PDO::PARAM_STR); 
    $request->bindValue(":email", $email, PDO::PARAM_STR); // On associé la valeur au paramétre nommé
    $request->bindValue(":password", $password, PDO::PARAM_STR);
    $request->execute(); // On execute la requête

}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <section>
        <h1>Inscription</h1>
            
        <form method="post">
                    
            <input type="text" placeholder="username" name="username" value="<?php if(isset($username)){ echo $username; }?>" required>   
                    
                    
            <input type="email" placeholder="Adresse mail" name="email" value="<?php if(isset($email)){ echo $email; }?>" required>
                    
            <input type="password" placeholder="Mot de passe" name="password" value="<?php if(isset($password)){ echo $password; }?>" required>
            <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
            <button type="submit" name="inscription">Envoyer</button>
        </form>

    </section>

    <h2>Connexion</h2>

    <form method="post">
                    
        <input type="text" placeholder="username" name="username" value="<?php if(isset($username)){ echo $username; }?>" required>               
        <input type="email" placeholder="Adresse mail" name="email" value="<?php if(isset($email)){ echo $email; }?>" required>
        <button type="submit" name="connexion">Envoyer</button>
    </form>


</body>



</html>


</body>
</html>
