<?php 
if(isset($_REQUEST['name']))
{
    
    $names=array("Piedra","Papel","Tijeras");
    // Valores del selector, 0 = Piedra, 1 = Papel y 2 = Tijeras
    $resultado="";
    function check($computer,$human)
    {
        // Comprobaciones que retornan un String
        if(($computer == 1) && ($human== 0))
        {
            return "Has perdido";
        }
        else if(($computer == 0) && ($human== 2))
        {
            return "Has perdido";
        }
        else if(($computer == 2) && ($human== 1))
        {
            return "Has perdido";
        }
        else if(($computer == 2) && ($human== 0))
        {
            return "Has ganado";
        }
        else if(($computer == 0) && ($human== 1))
        {
            return "Has ganado";
        }
        else if(($computer == 1) && ($human== 2))
        {
            return "Has ganado";
        }
        else 
        {
            return "Empate";
        }
        
    }
    if(isset($_POST['jugada']))
    {
        if($_POST['jugada']!="")
        {
            $jugada=$_POST['jugada'];
            if($jugada=="Test")
            {
                // Comprobacion en Test
                for($c=0;$c<3;$c++)
                {
                    for($h=0;$h<3;$h++)
                    {
                        $r=check($c,$h);
                        $resultado.="Humano=".$names[$h]." Ordenador=".$names[$c]." Result=".$r."\n";
                    }
                }
            }
            else
            {
                $computer=mt_rand(0,2);
                $r=check($computer,$jugada);
                $resultado="Humano=".$names[$jugada]." Ordenador=".$names[$computer]." Result=".$r."\n";
            }
        }
    }
    
    
    ?>
    <!DOCTYPE html>
    <html>
    	<head></head>
    	<body>
    		<h1>Piedra Papel o Tijera</h1>
    		<p>Bienvenido: <?php echo $_REQUEST['name'];?></p>
    		<form action="game.php" method="post">
    			<p><select name="jugada">
    					<option value=''>Select</option>
    					<option value=0>Piedra</option>
    					<option value=1>Papel</option>
    					<option value=2>Tijeras</option>
    					<option value="Test">Test</option>
    				</select>
    				<input type="hidden" name="name" value='<?php echo $_REQUEST['name'];?>'>
    				<input type="hidden" name="result" value='<?php echo $resultado;?>'>
    				<input type="submit" value="Jugar" name="jugar">
    				<button type="button" onclick="window.location.href='index.php'" name='logout' id='logout'>Logout</button>
    			</p>
    			<?php 
    			if(isset($_POST['jugada'])){
    			    echo "<p><textarea rows='10' cols='60'>".$resultado."</textarea></p>";
    			}else{
    			    echo "<p><textarea rows='10' cols='60'>Selecciona una opci&oacute;n del menu desplegable</textarea></p>";
    			}
    			?>
    			<p></p>
    		</form>
    	</body>
    </html>
    <?php
}
else
{
    die("Falta el nombre del par&aacute;metro");
}
?>
