<!DOCTYPE html>
<?php
include("../DAO/DAOModule.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<style>
    .searchBar{
        float:right;
        width:50%;
        margin:30px;
        padding: 10px 50px;
     }
    .btnBar{
        width:40%;
        float:left;
        margin:30px;
        padding: 10px 50px;
    
     }
@media screen and (max-width: 480px) {
  body {
   margin:0;
  }
  table,tr, td, tbody,thead,th, td p table div, table table{
        width:100%!important;
        float:left;
        clear:both;
        display:block;
        text-align:center;
    }
  .searchBar{
      width:100%;
      margin:0;
      padding:0;
  }
  .btnBar{
    width:100%;
      margin:10px 50px;
      padding:0;
  }
  
}
</style>
<body>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Projet de gestion des modules</span>
    </nav>
    <div class="searchBar">
        <div class="input-group">
            <input type="search" id="FiliereInput" class="form-control rounded" placeholder="Filiere" aria-label="Search"
                aria-describedby="search-addon" />
            <input type="search" id="ModuleInput" class="form-control rounded" placeholder="Module" aria-label="Search"
                aria-describedby="search-addon" />
            <button type="button" id="searchBtn" class="btn btn-outline-primary">chercher</button>
        </div>

    </div>
    </div>

    <div class="btnBar">
       <a href="../Actions/AjouterModule.php"> <button type="button" class="btn btn-primary btn-lg ">Ajouter Module</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Num Module</th>
                <th scope="col">Nom Module</th>
                <th scope="col">Nom Filiere</th>
                <th scope="col">Type</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="ModuleList">
          <?php 
          echo tousLesModules();
          ?>
        </tbody>
    </table>

    <script type="text/javascript">
    $(document).ready(function(){
        $("#searchBtn").click(function(){
            $.ajax({
                type:'POST',
                url:'../Actions/RechercheModule.php',
                data:{
                    module:$('#ModuleInput').val(),
                    filiere:$('#FiliereInput').val()
                },
                success:function(data){
                    $('#ModuleList').html(data);
                }
            });
        });
        
    });
    function SupprimerAJAX( idVoulu, nomM){
            var result = confirm("voulez vous vraiment supprimer "+nomM);
            if (result) {
                $.ajax({
                type:'POST',
                url:'../Actions/Supprimer.php',
                data:{
                   id: idVoulu
                },
                success:function(data){
                    $('#ModuleList').html(data);
                }
            });
            }
        }
    </script>
</body>

</html>