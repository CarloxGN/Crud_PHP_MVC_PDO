<?php
defined('WEBSITEPATH') OR exit('No direct script access allowed');
$title = WEBSITENAME.' | Bienvenido';
?>
<!DOCTYPE html>
<html>
<head>
<?php
	include_once('includes/head.php');
?>
</head>
<body>
	    <div class="msg" style="z-index: 99 !important">
	    	<?php include 'includes/reports.php'; ?>
	    </div><p>&nbsp;</p>
		<!-- Iconos de formularios en esta dirección https://fontawesome.com/start -->
		<div class="well">
		<div align="center" style="color: blue;font-size: 25px;">Formulario</div>
		</div>
		<p>
		  <div class="container">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="well well-sm">
		                <form class="form-horizontal" method="post" action="<?php  echo WEBSITEPATH.'?pg=ejecutar';?>" onsubmit="return confirm('Esta acci&oacute;n registrar&aacute; los datos de este formulario. Desea proceder?')">
		                    <fieldset>
		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-user-circle  bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input id="fname" name="name" type="text" placeholder="Nombre / m&aacute;x 30 caracteres" class="form-control" maxlength="30" required="required">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-user-circle bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input id="lname" name="lastname" type="text" placeholder="Apellido / m&aacute;x 30 caracteres" class="form-control" maxlength="30" required="required">
		                            </div>
		                        </div>

		                         <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-id-card bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input id="document" name="document" type="number" placeholder="Identificaci&oacute;n / m&aacute;x 10 digitos" min="1" max="9999999999" class="form-control" required="required">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-envelope-square bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input id="email" name="email" type="email" placeholder="Correo Electr&oacute;nico / m&aacute;x 40 caracteres" class="form-control" maxlength="40" required="required">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-globe-americas"></i></span>
		                            <div class="col-md-8">
		                                <select name="country" id="country" placeholder="Pa&iacute;s" class="form-control" required="required"><?php
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
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
		                            <div class="col-md-8">
		                                <input id="phone" name="telf" type="number" min="1" max="9999999999" placeholder="Tel&eacute;fono / m&aacute;x 10 digitos" class="form-control" required="required">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <span class="col-md-1 col-md-offset-2 text-center"><i class="far fa-file-alt bigicon"></i></span>
		                            <div class="col-md-8">
		                                <textarea class="form-control" id="message" name="message" placeholder="Escriba su mensaje" rows="7" required="required"></textarea>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-12 text-center">
		                            	<input type="submit" name="accion" value="Registrar" class="btn btn-primary btn-lg" >
		                            </div>
		                        </div>

		                    </fieldset>
		                </form>
		            </div>

		            <div class="well well-sm">
			            <table id="blogtable" class="display" cellspacing="0" width="100%" style="font-size:10px">
							 <thead>
								 <tr>
								 	 <th style="text-align: center" width="">Id</th>
									 <th style="text-align: center" width="">Nombre</th>
									 <th style="text-align: center" width="">Apellido</th>
									 <th style="text-align: center" width="">Identificador</th>
									 <th style="text-align: center" width="">Email</th>
									 <th style="text-align: center" width="">Pa&iacute;s</th>
									 <th style="text-align: center" width="">Tel&eacute;fono</th>
									 <th style="text-align: center" width="">Mensaje</th>
								 </tr>
							 </thead>
							 <tbody>
					            <?php 
					            	$user = new controllerUsers();
					            	$result = $user->listUsers();
					            	if ($result != 0){
						            	foreach ($result as $row){
						            		echo '
						            		<tr>
							            		<td><a href="'.WEBSITEPATH.'/index.php?pg=modificar&id='.$row['id_user'].'">'.$row['id_user'].'</a></td>
							            		<td><a href="'.WEBSITEPATH.'/index.php?pg=modificar&id='.$row['id_user'].'">'.$row['name_user'].'</a></td>
							            		<td><a href="'.WEBSITEPATH.'/index.php?pg=modificar&id='.$row['id_user'].'">'.$row['lastname_user'].'</a></td>
							            		<td><a href="'.WEBSITEPATH.'/index.php?pg=modificar&id='.$row['id_user'].'">'.$row['document_user'].'</a></td>
							            		<td><a href="'.WEBSITEPATH.'/index.php?pg=modificar&id='.$row['id_user'].'">'.$row['email_user'].'</a></td>
							            		<td><a href="'.WEBSITEPATH.'/index.php?pg=modificar&id='.$row['id_user'].'">'.$row['name_country'].'</a></td>
							            		<td><a href="'.WEBSITEPATH.'/index.php?pg=modificar&id='.$row['id_user'].'">'.$row['phone_user'].'</a></td>
							            		<td>'.substr($row['message_user'], 0, 200).'... </td>
						            		</tr>';
						            	}
						            }
					            ?>
						 	</tbody>
						</table>
		            </div>
		        </div>
		    </div>
		</div>
		</p>
	</body>
</html>