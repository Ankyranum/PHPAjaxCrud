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
            <h5 class="card-title text-center">Giriş Yap</h5>
            <form method="post" action="login.php">
                <div class="form-label-group">
                    <label for="inputEmail">E-mail</label>
                    <input type="email" id="inputEmail" name="kullanici_email" class="form-control"
                        placeholder="Email adresi" required autofocus>
                    
                </div>
                <hr>
                <div class="form-label-group">
                 <label for="inputPassword">Şifre</label>
                    <input type="password" id="inputPassword" name="kullanici_sifre"class="form-control"
                        placeholder="Şifresi" required>
                   
                </div>
                <hr>
                <button
                class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                type="submit" name="giris">GİRİŞ YAP</button>
                <div class="text-center">
                    <a class="small" href="register.php">Kayıt Ol</a>
            </form>
        </div>
            
            
    </body>
</html>
    <?php 
    include 'veritabani.php'; 
        if (isset($_POST['giris'])){
            $kullanici_email = $_POST['kullanici_email'];
            $kullanici_sifre = $_POST['kullanici_sifre'];
            $query  = $db->query("SELECT * FROM kullanici WHERE email='$kullanici_email' && sifre='$kullanici_sifre'");
            $dizi = $query->fetchAll(\PDO::FETCH_ASSOC);
            if ( $say = $query -> rowCount() ){
                if( $say > 0 ){
                    
                    $_SESSION['oturum']=true;
                    $_SESSION['kullanici_email']= $kullanici_email;
                    $_SESSION['kullanici_sifre']= $kullanici_sifre;
                    $_SESSION['kullanici_id']=$dizi[0]['id'];   
                    session_start();
                    header("Location: index.php");                                          
                }
                else{
                    $message1 = "Oturum açılmada hata";
                    echo "<div class='alert alert-danger'>$message1</div>";
                }
            }
            else{
                    $message = "Kullanıcı adı veya şifre hatalı";
                    echo "<div class='alert alert-danger'>$message</div>";
            }
        }
        ?>

