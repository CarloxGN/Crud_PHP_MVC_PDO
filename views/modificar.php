<?php
defined('WEBSITEPATH') OR exit('No direct script access allowed');
$id_user = filter_input(INPUT_GET, 'id', $filter = FILTER_VALIDATE_INT);
if ($id_user == ""):
	header('Location:?pg=start&er=8');
else:
	$title = WEBSITENAME.' | Modificar usuario';
?>
<!DOCTYPE html>
<html>
<head>
<?php
include_once 'includes/head.php';
?>
</head>
<body>
	<div class="msg" style="z-index: 99 !important">
	    	<?php include 'includes/reports.php'; ?>
	    </div><p>&nbsp;</p>
	<?php
	$user = new controllerUsers();
	$result = $user->listUser($id_user);
	if ($result == 0){
		header('Location: index.php?pg=start&er=10');
	}else{
		foreach ($result as $row){
	?>
	<div class="well">
		<div align="center" style="color: blue;font-size: 25px;">Actualizaci&oacute;n de Registro</div>
	</div>
	<p>
		  <div class="container">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="well well-sm">
		                <form class="form-horizontal" method="post" action="<?php echo WEBSITEPATH.'?pg=ejecutar';?>">
		                	<input type="hidden" name="id_user" value="<?=$row['id_user']; ?>">
		                    <fieldset>
		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-user-circle  bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input title="m&aacute;x. 30 caracteres" id="fname" name="name" type="text" placeholder="Nombre" maxlength="30" class="form-control" required="required" value="<?=$row['name_user']; ?>">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-user-circle bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input title="m&aacute;x. 30 caracteres" id="lname" name="lastname" type="text" placeholder="Apellido" maxlength="30" class="form-control" required="required" value="<?=$row['lastname_user']; ?>">
		                            </div>
		                        </div>

		                         <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-id-card bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input title="m&aacute;x. 10 d&iacute;gitos" id="document" name="document" type="number" placeholder="Identificaci&oacute;n / m&aacute;x 10 d&iacute;gitos" class="form-control" required="required" value="<?=$row['document_user']; ?>" min="1" max="9999999999">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-envelope-square bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input title="m&aacute;x. 40 caracteres" id="email" name="email" type="email" placeholder="Correo Electr&oacute;nico" maxlength="40" class="form-control" required="required" value="<?=$row['email_user']; ?>">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input title="m&aacute;x. 10 d&iacute;gitos" id="phone" name="telf" type="number" placeholder="Tel&eacute;fono / m&aacute;x 11 caracteres" class="form-control" required="required" value="<?=$row['phone_user']; ?>" min="1" max="9999999999">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-globe-americas"></i></span>
		                            <div class="col-md-8">
		                                <select name="country" id="country" placeholder="Pa&iacute;s" class="form-control" required="required"><?php
		                                echo '<option value="'.$row['id_country'].'" selected="selected">'.$row['name_country'].'  -- SELECCI&Oacute;N ACTUAL</option>';
		                                $countries = new controllerCountries();
		                                $result2 = $countries->listCountries();
		                                foreach ($result2 as $row2){
		                                	echo '<option value="'.$row2['id_country'].'">'.$row2['name_country'].'</option>';
		                            	}
	                                	unset($result2);
		                                ?>
		                                </select> 
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="far fa-file-alt bigicon"></i></span>
		                            <div class="col-md-8">
		                                <textarea title="m&aacute;x. 1000 caracteres" class="form-control" id="message" name="message" placeholder="Escriba su mensaje." rows="7" required="required"><?=$row['message_user']; ?></textarea>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-12 text-center">
		                                <input type="submit" name="accion" value="Actualizar" class="btn btn-primary btn-lg" onclick="return confirm('Esta acci&oacute;n actualizar&aacute; los datos de este registro. Desea proceder?')">

		                                &nbsp;&nbsp;&nbsp;
		                                
		                                <input type="submit" name="accion" value="Eliminar" class="btn btn-primary btn-lg" onclick="return confirm('Esta acci&oacute;n ELIMINAR&Aacute; este registro de manera permanente. Desea proceder?')">

		                                &nbsp;&nbsp;&nbsp;
		                                
		                                <a href="<?php echo WEBSITEPATH.'?pg=start';?>" class="btn btn-primary btn-lg" onclick="return confirm('Desear regresar a la página de inicio?');">
										    Regresar
										</a>
		                                 
		                            </div>
		                        </div>
		                    </fieldset>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
		</p>
		<?php
			}
		}
		?>
	</body>
</html>
<?php
endif;
?>
