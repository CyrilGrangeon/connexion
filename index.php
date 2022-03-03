<?php

include_once 'connexionBdd.php';

  //----------------C du CRUD--------------
if(isset($_POST['inscription'])){

    $user = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //prepare request
    $request = $db->prepare("SELECT * FROM inscription WHERE username=:user");
    $request ->bindValue(":user", $user, PDO::PARAM_STR);
    //execute request
    $request->execute(); 
    //fetch result
    $users = $request->fetch();
    
    if ($users!=false) {
        echo "Ce pseudo est déjà pris !";
    } else {
        $sqlC = "INSERT INTO inscription( username, email, password) VALUES (:username, :email, :password)";
        $request = $db->prepare($sqlC); //On prépare la requête
        $request->bindValue(":username", $user, PDO::PARAM_STR); //Il faut binder toutes les valeurs entrées par l'utilisateur
        $request->bindValue(":email", $email, PDO::PARAM_STR); //Il faut binder toutes les valeurs entrées par l'utilisateur
        $request->bindValue(":password", $pwd, PDO::PARAM_STR); //Il faut binder toutes les valeurs entrées par l'utilisateur
        $request->execute(); //On exécute la requête
    } 

}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script defer src="app.js"></script>
</head>

<body>
    <section>
        <h1>Inscription</h1>
        <p id="error"></p>
            
        <form id="form" method="post">
                    
            <input id= "username"type="text" placeholder="username" name="username" value="<?php if(isset($username)){ echo $username; }?>" required>   
                    
                    
            <input id="email" type="email" placeholder="Adresse mail" name="email" value="<?php if(isset($email)){ echo $email; }?>" required>
                    
            <input id="password" type="password" placeholder="Mot de passe" name="password"  required>
            <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
            <button type="submit" name="inscription">Envoyer</button>
        </form>

        <input type="checkbox" id="rgpd" name="rgpd" required>
        <label for="checkbox"> Cocher la case pour accepter les RGPD</label>

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