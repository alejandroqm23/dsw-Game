<?php 
$mensaje="";
// Sal creada aporreando el teclado
$salt="dvnlserv8nv383v8yrtw8woad9rjfdsaow";
$storedpass=hash('md5',"password".$salt);
if(isset($_POST['name']) || isset($_POST['pass']))
{
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    if($name == "" | $pass=="")
    {    
	// Si por algun motivo se manda el campo usuario y/o el campo password vacios se imprimira este mensaje
        $mensaje="Se requiere nombre de usuario y clave para acceder";   
    }
    else
    {
        $pass=hash('md5',$pass.$salt);
        if($pass!=$storedpass)
        {
		// Si la contraseña no coincide con la contraseña guardada se imprimira este mensaje
            $mensaje="Contrase&ntilde;a incorrecta";
        }
        else
        {
            header("Location: game.php?name=".urlencode($name));
        }
    }
    
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	</head>
	<body>
		<?php if(isset($_POST['pass'])){ echo "<p>".$mensaje."</p>";} ?>
		<form action="login.php" method="post">
			<p>
				<label for="name">Nombre de usuario</label>
				<input type="text" id="name" name="name" required="required" 
					size="40" placeholder="Nombre de usuario requerido">
			</p>
			<p>
				<label for="pass">Password</label>
				<input type="password" id="pass" name="pass" required="required" size="40">
			</p>
			<p>
				<input type="submit" name="enviar" value="Iniciar Sesi&oacute;n">
			</p>
		</form>
	</body>
</html>
