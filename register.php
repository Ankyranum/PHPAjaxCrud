<?php 
session_start();
if(isset($_SESSION['oturum']))
header("Location: index.php");?>
<html>
    <head>
        <link rel="stylesheet" href="arkaplan.css" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="kit.fontawesome.com/99077ca7e0.js" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body style="background-color: lightgray">
        <div class="jumbotron mt-5" style="width: 400px; height: 475px; margin: auto; box-shadow: 10px 10px 8px #888888; ">
        <h5 class="card-title text-center">Kayıt Ol</h5>
        <form class="form-signin" method="POST" action="register.php">
            <div class="form-label-group">
                <label for="kullanici_email">E-mail</label>
                <input type="email" id="kullanici_email" name="kullanici_email" class="form-control"
                    placeholder="Email adresi" required>
                
            </div>
            <hr>
            <div class="form-label-group">
                <label for="kullanici_sifre">Şifre</label>
                <input type="password" id="kullanici_sifre" name="kullanici_sifre" class="form-control"
                    placeholder="Şifresi" required>
                
            </div>
            <hr>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" name="kayit" type="submit">Kayıt
                Ol</button>
            <a class="d-block text-center mt-2 small" href="login.php">Giriş Yap</a> 
        </form>
        
    </body>
</html>
    <?php

        if (isset($_POST['kayit'])){
        require_once('veritabani.php');
        $kullanici_email = ($_POST["kullanici_email"]);
        $kullanici_sifre = ($_POST["kullanici_sifre"]);
        $query1 = $db->query("SELECT * FROM kullanici WHERE email = '".$kullanici_email."'");
        $dizi = $query1->fetchAll(\PDO::FETCH_ASSOC);
        if ( !$dizi[0]['email'] == $kullanici_email){ 
                    $query = $db->prepare("INSERT INTO kullanici SET 
                    email = ?,
                    sifre = ?");
                    $insert  = $query->execute(array(
                    $kullanici_email,$kullanici_sifre
                    ));
                    if (isset($insert)){
                        $last_id = $db->lastInsertId();
                        header("Location: login.php"); 
                    }
                    else{
                        $message = "Kayıt işleminde hata oluştu.";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                }
                else {
                echo '<small><div class="alert alert-danger">BU E-POSTA ADRESİ BAŞKASI TARAFINDAN KULLANILIYOR</div></small>';
                }?>
                </div>
        <?php
    }   
    ?>

