<?php
include("server/connection.php");
include ("sideBar.php");
include ("server/profileDB.php");
$con = connect();
$user = selectDataProfile($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div id="grid">
        <?php include("navBar.php")?>
        <div id="profile">
            <div id="profileImg">
                <?php if(isset($_SESSION['user'])&&$_SESSION['user']['userPhoto'] != ""){ ?>
                    <img src="<?=$_SESSION['user']["userPhoto"]?>">
                <?php }else{ ?>
                    <img src="img/default.png">
                <?php } ?>
                <form id="imgForm" method="post" action="imgUpload.php" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="reset">Descartar</button>
                    <button type="submit">Aceptar</button>
                </form>
            </div>
            <div id="profileData">
                <form id="profileForm" onsubmit="return request2server(this.id, 'server/verifyUpdate.php')">
                    <input type="hidden" name="userId" value="<?=$user[0]['id']?>">
                    <input type="email" name="email" placeholder="Correo" disabled value="<?=$user[0]['email']?>">
                    <input type="text" name="user" placeholder="Usuario" disabled value="<?=$user[0]['user']?>">
                    <input type="text" name="name" placeholder="Nombre" value="<?=$user[0]['name']?>">
                    <input type="text" name="surname" placeholder="Apellido" value="<?=$user[0]['surname']?>">
                    <button type="submit">Guardar</button>
                </form>
                <div id="errorRegistry"></div>
            </div>
        </div>
    </div>
</body>
    <script src="js/main.js"></script>
</html>