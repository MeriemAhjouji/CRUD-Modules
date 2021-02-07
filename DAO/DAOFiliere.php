<?php
include("../DAO/DAOModule.php");

//afficher tous les modules:
function tousLesFilieres($selectedID){
    $cnx = getconnection();
    // On admet que $db est un objet PDO
    $request =  $cnx->query("SELECT * FROM filier ");
   
        
    while ($r = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
    {
            if($selectedID == $r["codeF"] ){
            echo '<option value="'.$r["codeF"].'" selected="selected">'.$r["nomF"].'</option>';
            }else{
                echo '<option value="'.$r["codeF"].'">'.$r["nomF"].'</option>';
            }
    }
  
}
?>