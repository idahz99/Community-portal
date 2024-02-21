<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="includes\accesspages.css" rel="stylesheet" />
    <title>Log masuk Pembekal</title>
</head>
<body class="body">
<img id="logo" src="assets\images\simplelogo.png" alt="ebalinglogo">
    <div id="card">
        <h2>Log masuk</h2>
        <form class="form" action="includes/register.inc.php" method="post">

        <label for="Email">E-mail</label><br>
        <input class=input type=Email name=email id=emailp required><br>

        <label for="password">Kata Laluan</label><br>
        <input class=input type="password" name=password id=pass required><br>
        
        
        <input  id="button" class="input" type="submit" name = "Login" value="Log Masuk" />
        <span> Tiada akaun? <a  href="Register.php" style="color:#F6A051">Datar sini</a></span>
       <p><span>atau</span></p>
         
         <?php include('googlelogindex.php');
         
       
       
        
        
        ?>

            </form>
    </div>
</body>
</html>