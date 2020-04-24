<?php 
	function listadoDirectorio($directorio){
	    $listado = scandir($directorio);
	    unset($listado[array_search('.', $listado, true)]);
	    unset($listado[array_search('..', $listado, true)]);
	    if (count($listado) < 1) {
	        return;
	    }
	    foreach($listado as $elemento){
	    	if(!is_dir($directorio.'/'.$elemento)) {
	        	echo "<li>- <a href='$directorio/$elemento'>$elemento</a></li>";
	        }
	        if(is_dir($directorio.'/'.$elemento)) {
	        	echo '<li class="open-dropdown">+ '.$elemento.'</li>';
	    		echo '<ul class="dropdown d-none">';
	        		listadoDirectorio($directorio.'/'.$elemento);
	    		echo '</ul>';
	        }
	    }
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listar directorio php</title>
	<style>
		ul {
			list-style-type: none;
		}
		.d-none {
			display: none;
		}
		.open-dropdown {
			font-weight: bold;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<script>
		$(document).ready(function(){
		  $(".open-dropdown").click(function(){
		    $(this).next( "ul.dropdown" ).toggleClass('d-none');
		  });
		});
	</script>
</head>
<body>
	<ul>
		<?php listadoDirectorio('archivos'); ?>
	</ul>
</body>
</html>