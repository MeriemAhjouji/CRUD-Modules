<?php
require("../DAO/DAOMYSQL.php");


//afficher tous les modules:
function tousLesModules(){
    $cnx = getconnection();
    // On admet que $db est un objet PDO
    $request =  $cnx->query("SELECT * FROM module INNER JOIN filier ON module.codeFk = filier.codeF ORDER BY numModule ASC");
   
        
    while ($r = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
    {
        echo ' <tr>
        <th scope="row">'.$r["numModule"].'</th>
        <td>'.$r["nomM"].'</td>
        <td>'.$r["nomF"].'</td>
        <td>'.$r["TypeM"].'</td>

        <td><a href="../Actions/ModifierModule.php?id='.$r["numModule"].'"><button type="button" class="btn btn-info">Modifier</button></a></td>
        
        <td><a><button onClick="SupprimerAJAX('.$r["numModule"].',`'.$r["nomM"].'`)"  type="button" class="btn btn-danger">Supprimer</button></a></td>
    </tr>
    ';
    }
  
}

//ajouter un module:
function ajouterModule($nomModule,$TypeModule,$ChargeHS1,$ChargeHS2,$ChargeHS3,$ChargeHS4,$codeFiliere){
    $cnx = getconnection();
    // On admet que $db est un objet PDO
    $sql = "INSERT INTO module( nomM, codeFk, ChargeHS1, ChargeHS2, ChargeHS3, ChargeHS4, TypeM)
     VALUES (?,?,?,?,?,?,?);";
     
    $stmt=$cnx->prepare($sql);
    $stmt->execute([$nomModule,$codeFiliere,$ChargeHS1,$ChargeHS2,$ChargeHS3,$ChargeHS4,$TypeModule]);

}
function findModuleByID($id){
    $cnx = getconnection();
    $req = "SELECT * FROM module WHERE numModule=".$id;
    $res=ExecuteScalar($cnx,$req);
    return $res;
    
}
function modifierModule($numModule,$nomModule,$TypeModule,$ChargeHS1,$ChargeHS2,$ChargeHS3,$ChargeHS4,$codeFiliere){
    $cnx=getconnection();
    $sql = "UPDATE module SET nomM=?,TypeM=?, ChargeHS1=?, ChargeHS2=?, ChargeHS3=?, ChargeHS4=?,codeFk=? WHERE numModule=?";
    $stmt= $cnx->prepare($sql);
    $stmt->execute([$nomModule,$TypeModule,$ChargeHS1,$ChargeHS2,$ChargeHS3,$ChargeHS4,$codeFiliere,$numModule]);
}

function deleteModule($numModule){
    $cnx=getconnection();
    $sql="DELETE from module WHERE numModule=?";
    $stmt=$cnx->prepare($sql);
    $stmt->execute([$numModule]);
}

function recherche($nomModule,$nomFilier){
    $Resultat='';
    $cnx=getconnection();
    $request=$cnx->query("select * from module INNER JOIN filier ON filier.codeF = module.codeFk WHERE nomM like '${nomModule}' OR filier.nomF Like '${nomFilier}'");
    
    while ($r = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
    {
        if($r>0){
            echo ' <tr>
            <th scope="row">'.$r["numModule"].'</th>
            <td>'.$r["nomM"].'</td>
            <td>'.$r["nomF"].'</td>
            <td>'.$r["TypeM"].'</td>
    
            <td><a href="../Actions/ModifierModule.php?id='.$r["numModule"].'"><button type="button" class="btn btn-info">Modifier</button></a></td>
            
            <td><a><button onClick="SupprimerAJAX('.$r["numModule"].','.$r["nomM"].')" type="button" class="btn btn-danger">Supprimer</button></a></td>
        </tr>
        ';
        }else{
                echo '<tr> Pas de resultats </tr>';
        }
    }
}

?>