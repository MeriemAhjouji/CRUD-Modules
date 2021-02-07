<?php 

function getconnection (){
   
    try{
        $server="localhost";
        $db="basedonne";
        $user="root";
        $pswd="";
        $cnxString="mysql:host=$server; dbname=$db";
        $cnx= new PDO($cnxString,$user,$pswd);
    
    }
    catch(PDOException $e){
        echo("\n".$e->getMessage()."\n");
    }
return $cnx;
}
function ExecuteNonQuery($pdo, $req){
    return $pdo->exec($req);// hadi executer 
}

function ExecuteReader($pdo, $req){
    return $pdo->query($req);// hadi bax t9ra 
}

function ExecuteScalar($pdo, $req){
    $dr =  $pdo->query($req);
    $r = $dr->fetch();
    $dr->closeCursor();
    return $r;//t9ra bzf d data y3ni liste...
}
?>