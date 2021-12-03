

 <!--  // récupération des données du formulaire
    if (!empty($_POST['Id_Bateaux']) && !empty($_POST['Nom_Bateau_Sauvetage']) && !empty($_POST['Nom_Bateau_Couler']))  //Si c'est rempli alors :
    {
        $Id_Bateaux= $_POST['Id_Bateaux'];   
        $Nom_Bateau_Sauvetage= $_POST['Nom_Bateau_Sauvetage'];
        $Nom_Bateau_Couler= $_POST['Nom_Bateau_Couler'];

        $Id_Cl= $_POST['Id_Cl'];   
        $Pseudo_Cl= $_POST['Pseudo_Cl'];
        $Adresse_Cl= $_POST['Adresse_Cl'];
        $MDP_Cl= $_POST['MDP_Cl']; 
        $Statut_Cl= $_POST['Statut_Cl'];     
       
       
    }
    else { //sinon on affiche qu'il manque des choses
        echo "Des cases sont non remplies"; 
    }
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>NUIT INFO 2021</title>
        <style type="text/css"></style>
    </head>
    <body>
        <form action="" method ="POST">
        <input type="number" name="Id_Bateaux" value="">
        <input type="number" name="Nom_Bateau_Sauvetage" value="">
        <input type="text" name="Nom_Bateau_Couler" value="">
        <br>
        <input type="number" name="Id_Cl" value="">
        <input type="text" name="Pseudo_Cl" value="">
        <input type="text" name="Adresse_Cl" value="">
        <input type="text" name="MDP_Cl" value="">
        <input type="boolean" name="Statut_Cl" value="">
        <br>
        <input type="number" name="Id_Sauvetage" value="">
        <input type="date" name="Date_Sauvetage" value="0000-00-00">
        <input type="text" name="Info_Sauvetage" value="">
        <br>
        <input type="number" name="Id_Sauveteur" value="">
        <input type="text" name="Nom_Sauveteur" value="">
        <input type="text" name="Prenom_Sauveteur" value="">
        <input type="number" name="Age_Sauveteur" value="">
        <input type="text" name="Liste_Sauvetage" value="">
        <input type="text" name="Info_Sauveteur" value="">
        
        <input type="submit" value="Envoyer">
        </form>
      </body>
</html>

<?php
$servername = "mysql-loul.alwaysdata.net";
$username = "loul";
$password = "zebikiki";
$dbname = "loul_sauveteur";

    $Id_Bateaux= $_POST['Id_Bateaux'];   
    $Nom_Bateau_Sauvetage= $_POST['Nom_Bateau_Sauvetage'];
    $Nom_Bateau_Couler= $_POST['Nom_Bateau_Couler'];
    
        $Id_Cl= $_POST['Id_Cl'];   
        $Pseudo_Cl= $_POST['Pseudo_Cl'];
        $Adresse_Cl= $_POST['Adresse_Cl'];
        $MDP_Cl= $_POST['MDP_Cl']; 
        $Statut_Cl= $_POST['Statut_Cl'];

        $Id_Sauvetage= $_POST['Id_Sauvetage'];
        $Date_Sauvetage= $_POST['Date_Sauvetage'];
        $Info_Sauvetage= $_POST['Info_Sauvetage'];

        $Id_Sauveteur= $_POST['Id_Sauveteur'];   
        $Nom_Sauveteur= $_POST['Nom_Sauveteur'];
        $Prenom_Sauveteur= $_POST['Prenom_Sauveteur'];
        $Age_Sauveteur= $_POST['Age_Sauveteur']; 
        $Liste_Sauvetage= $_POST['Liste_Sauvetage'];
        $Info_Sauveteur= $_POST['Info_Sauveteur'];

try {
    //Connexion avec la base de donnée (J'ai utilisé PDO car la fonction mysql_connect ne fonctionne pas chez moi j'ai donc trouvé cette solution qui fonctionne)
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);  
  // On met les exception des PDO
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //On insere ce que l'utilisateur a mis dans le formulaire
  $sql = "INSERT INTO BATEAU (Id_Bateaux, Nom_Bateau_Sauvetage, Nom_Bateau_Couler)    VALUES ('$Id_Bateaux', '$Nom_Bateau_Sauvetage', '$Nom_Bateau_Couler')";
  $sql = "INSERT INTO CLIENT (Id_Cl, Pseudo_Cl, Adresse_Cl, MDP_Cl, Statut_Cl)    VALUES ('$Id_Cl', '$Pseudo_Cl', '$Adresse_Cl', '$MDP_Cl', '$Statut_Cl')";
  $sql = "INSERT INTO SAUVETAGE (Id_Sauvetage, Date_Sauvetage, Info_Sauvetage)    VALUES ('$Id_Sauvetage', '$Date_Sauvetage', '$Info_Sauvetage')";
  $sql = "INSERT INTO SAUVETEUR (Id_Sauveteur, Nom_Sauveteur, Prenom_Sauveteur, Age_Sauveteur, Liste_Sauvetage, Info_Sauveteur)    VALUES ('$Id_Sauveteur', '$Nom_Sauveteur', '$Prenom_Sauveteur', '$Age_Sauveteur', '$Liste_Sauvetage', '$Info_Sauveteur')";

  $conn->exec($sql);
  echo "Crée avec succés";
} 
    catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
// On récupère tout le contenu de la table famille
//$reponse = $conn->query('SELECT * FROM famille_tbl ORDER BY prenom ASC');

// On affiche chaque entrée
//while ($donnees = $reponse->fetch())
//{
    /*
?>
    <p>
      <!--On affiche en phrase ce que l'utilisateur a rentrée    -->
   Vous vous appelez <?php echo $donnees['nom']; ?> 
    <?php echo $donnees['prenom']; ?>, vous êtes <?php echo $donnees['statut']; ?> et vous êtes née le <?php echo $donnees['date']; ?><br />
    
   </p>
<?php
}
$reponse->closeCursor(); // Termine le traitement 

?>
*/