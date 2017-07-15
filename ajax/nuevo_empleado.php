<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php 
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libraries/password_compatibility_library.php");
}		
		if (empty($_POST['rut'])){
			$errors[] = "RUT vacío";
		}elseif (empty($_POST['nombres'])){
			$errors[] = "Nombres vacío.";
		} elseif (empty($_POST['apellidos'])){
			$errors[] = "Apellidos vacío.";
		}  elseif (empty($_POST['telefono'])) {
            $errors[] = "Telefono de empleado vacío.";
        } elseif (strlen($_POST['telefono']) > 10 && strlen($_POST['telefono']) <9) {
            $errors[] = "Telefono debe contener un maximo de 10 caracteres y minimo 9";
        }elseif (empty($_POST['direccion'])) {
            $errors[] = "Campo Direccion vacio.";
        }elseif (empty($_POST['cargo'])) {
            $errors[] = "Campo Cargo vacio.";
        } elseif (
			!empty($_POST['rut'])
			&& !empty($_POST['nombres'])
			&& !empty($_POST['apellidos'])
			&& !empty($_POST['telefono'])
            && !empty($_POST['direccion'])                    
            && !empty($_POST['cargo'])
            ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				
                $rut = mysqli_real_escape_string($con,(strip_tags($_POST["rut"],ENT_QUOTES)));
				$nombres = mysqli_real_escape_string($con,(strip_tags($_POST["nombres"],ENT_QUOTES)));
				$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));
				$telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
				$direccion = mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
                $cargo = mysqli_real_escape_string($con,(strip_tags($_POST["cargo"],ENT_QUOTES)));
				
                $sql = "SELECT * FROM empleado WHERE  ltrim(rtrim(rut)) = '" . rut . "';";
                $query_check_user_name = mysqli_query($con,$sql);
				$query_check_user=mysqli_num_rows($query_check_user_name);
                if ($query_check_user == 1) {
                    $errors[] = "Lo sentimos , el empleado ya se encuentra creado.";
                } else {
					
                    $sql = "INSERT INTO empleado (rut,nombres, apellidos, telefono, direccion, cargo)
                    VALUES('".$rut."','".$nombres."','".$apellidos."','" .$telefono. "', '" .$direccion. "', '" .$cargo. "');";
                    $query_new_user_insert = mysqli_query($con,$sql);

                    
                    if ($query_new_user_insert) {
                        $messages[] = "Empleado ha sido creado con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                }
            
        } else {
            $errors[] = "Un error desconocido ocurrió.";
        }
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>