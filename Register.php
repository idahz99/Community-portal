<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="includes\accesspages.css" rel="stylesheet" />
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <title>Document</title>
</head>
<body class="body">
<img id="logo" src="assets\images\simplelogo.png" alt="ebalinglogo">
    <div id="card">
        <h2>Daftar</h2>
        <form id="daftarform" class="form" action="includes/register.inc.php" method="post">
        <label for="Nama">Nama anda atau Perniagaan</label><br>
        <input class=input type="text" name=Nama id=namap required><br>

        <label for="Email">E-mail</label><br>
        <input class=input type=Email name=email id=emailp required><br>

        <label for="password">Kata Laluan</label><br>
        <input class=input type="password" name=password id=pass required><br>
        
        <label for="password">Mengesahkan Kata Laluan</label><br>
        <input class=input type="password" name=conpassword id=conpass required><br>
        <button id="button"  class="input" type="button" name = "Daftar" onclick = "compare('pass','conpass')" >Daftar</button>
        <span> Sudah ada akaun? <a  href="login.php" style="color:#F6A051">Log masuk sini</a></span>
        <p><span>Atau</span></p>
       
        <?php include('googlelogindex.php');
      
        
        
        ?>

            </form>
    </div>
</body>
<script>
function compare(pass1,pass2){
    var password1= document.getElementById(pass1).value;
    var password2 = document.getElementById(pass2).value;
    console.log(password1);
    console.log(password2);
    if(password1 == password2){
        document.getElementById("daftarform").submit();
    }else{
        alert("Sila pastikan kata laluan sepadan")
    }



}
    </script>





</html>