<?php
include("../DAO/DAOFiliere.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>


<body>

    <div class="container">

        <form class="well form-horizontal" action=" <?php $_SERVER["PHP_SELF"] ?>" method="post" id="contact_form">
            <fieldset>

                <!-- Form Name -->
                <legend>
                    <center>
                        <h2><b>Ajout Du Module</b></h2>
                    </center>
                </legend><br>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Nom Module</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="nomModule" placeholder="Nom Module" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Type du Module</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="typeM" class="form-control selectpicker">
                                <option value="">Selectionnez le type du module</option>
                                <option>I</option>
                                <option>A</option>
                                <option>C</option> 
                                 </select> 
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-4 control-label">La filiere</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select id="codeF" name="codeF" class="form-control selectpicker">
                                <option value="">Selectionnez la filiere</option>
                                <?php tousLesFilieres(-1); ?>
                                 </select> 
                        </div>
                    </div>
                </div> 
                          
                                <!-- nmber input-->

                                <div class="form-group">
                                    <label class="col-md-4 control-label">ChargeHS1</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-user"></i></span>
                                            <input name="ChargeHS1" placeholder="ChargeHS1" class="form-control"
                                                type="number">
                                        </div>
                                    </div>
                                </div>
                                 <!-- nmber input-->
                                 

                                <div class="form-group">
                                    <label class="col-md-4 control-label">ChargeHS2</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-user"></i></span>
                                            <input name="ChargeHS2" placeholder="ChargeHS2" class="form-control" type="number">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">ChargeHS3</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-user"></i></span>
                                            <input name="ChargeHS3" placeholder="ChargeHS3" class="form-control"
                                                type="number">
                                        </div>
                                    </div>
                                </div> <!-- nmber input-->

                                <div class="form-group">
                                    <label class="col-md-4 control-label">ChargeHS4</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-user"></i></span>
                                            <input name="ChargeHS4" placeholder="ChargeHS4" class="form-control"
                                                type="number">
                                        </div>
                                    </div>
                                </div>




                                <!-- Select Basic -->

                                <!-- Success message -->
                            <?php
                                            $nomMod=$TypeMod='';
                                            $ChargeHS1=$ChargeHS2=$ChargeHS3=$ChargeHS4=0;
                                            $codeF = 0;
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                $nomMod = $_POST["nomModule"];
                                                $ChargeHS1 = $_POST["ChargeHS1"];
                                                $ChargeHS2 = $_POST["ChargeHS2"];
                                                $ChargeHS3 = $_POST["ChargeHS3"];
                                                $ChargeHS4 = $_POST["ChargeHS4"];
                                                if(isset( $_POST["codeF"]) && isset($_POST["typeM"]) && $nomMod!=""){
                                                    
                                                    $TypeMod = $_POST["typeM"];
                                                
                                                    $codeF = $_POST["codeF"];
                                                    echo "on a id= ".$codeF." et type=".$TypeMod;

                                                    ajouterModule($nomMod,$TypeMod,$ChargeHS1,$ChargeHS2,$ChargeHS3,$ChargeHS4,$codeF);
                                                    //redirect ver index.php:
                                                    if (headers_sent()) {?>
                                                        <script> location.replace("../Presentation/index.php"); </script>
                                                        <?php
                                                    }
                                                    else{
                                                        exit(header("Location: ../Presentation/index.php"));
                                                    }
                                                    
                                                    
                                                }else{?>
                                                    <div class="alert alert-danger" role="alert" id="success_message">erreur ! <i
                                                    class="glyphicon glyphicon-thumbs-up"></i> veuillez verifier tous les champs</div>
                                                    <?php
                                                }
                                            }



                                            ?>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4"><br>
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <button type="submit" class="btn btn-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT 
                                        <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                                    </div>
                                </div>

            </fieldset>
        </form>
    </div>
    </div><!-- /.container -->
  
</body>

</html>