<html lang="en">
<?php 
session_start();
if(!isset($_SESSION['oturum']))
header("Location: login.php");?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://kit.fontawesome.com/d07363b410.js" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>ISMET</title>
  </head>
  <body style="background-color: lightgray">
    <section class="pt-5 pb-5 bg-dark inner-header" style="height: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="row">
                <div class="col-md-12 ">
                    <h3 class="text-center" style="color:white;">Arıza Kayıt Sistemi</h3>
                    <hr style="height 1px;color:black;background-color: black;">
                </div>
            </div>
                <div class="breadcrumbs">
                    <p class="mb-0 text-white"><a class="text-white"><i class="far fa-user"></i> &nbsp; </a><span class="text-success"><?php echo $_SESSION['kullanici_email'];?></span> &nbsp;&nbsp;&nbsp;  <a href="cikis.php"><i class="fas fa-sign-out-alt"></i></a> </p>
                </div>
            </div>
        </div>
    </div>
    </section>
    <br>