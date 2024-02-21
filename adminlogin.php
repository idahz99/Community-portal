<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="includes\accesspages.css" rel="stylesheet" />
    <title>Admin login</title>
</head>
<body class="body">
<img id="logo" src="assets\images\simplelogo.png" alt="ebalinglogo">
    <div id=card>
        <h2>Log masuk Admin</h2>
        <form class="form" action="includes/adminlogo.inc.php" method="post">

        <label for="username">Username</label><br>
        <input style="width:80%" class=input type=username name=username id=username required><br>

        <label for="password">Kata Laluan</label><br>
        <input style="width:80%" class=input type="password" name=password id=pass required><br>
        
        <input  id="button" class="input" type="submit" name="Login" value="Log Masuk" />
        
       
         
       
       
        
      

            </form>
    </div>
</body>
</html>