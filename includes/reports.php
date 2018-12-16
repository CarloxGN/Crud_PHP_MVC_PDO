<?php
if (isset($_GET['er']) && is_numeric($_GET['er'])) $err = filter_input(INPUT_GET, 'er', $filter = FILTER_VALIDATE_INT);
if (isset($_GET['suc'])) $succ = filter_input(INPUT_GET, 'suc', $filter = FILTER_VALIDATE_INT);
if (isset($_GET['error'])) $error = filter_input(INPUT_GET, 'error', $filter = FILTER_VALIDATE_INT);
if (isset($_GET['msg'])):
  $msg = filter_input(INPUT_GET, 'msg', $filter = FILTER_SANITIZE_STRING);
else:
  $msg = '';
endif;

if (isset($err) && isset($succ)):
  echo '<div class="alert alert-danger">Por favor no intente modificar las variable de la URI. Gracias!</div>';
  unset($succ);
  unset($er);
endif;
  if (isset($err)):
    unset($succ);
    switch ($err):
      case 1:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Nombre del usuario es requerido</div>';
        break;

      case 2:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Apellido del usuario es requerido</div>';
        break;

      case 3:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: N&uacute;mero de Documento del usuario es requerida</div>';
        break;

      case 4:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: El Correo del usuario es requerido</div>';
        break;

      case 5:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Tel&eacute;fono del usuario es requerido</div>';
        break;

      case 6:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Dato de pa&iacute;s no v&aacute;lido</div>';
        break;

      case 7:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Un mensaje es requerido</div>';
        break;

      case 8:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Identificador de usuario no v&aacute;lido</div>';
        break;

      case 9:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: No se seleccion&oacute; una acci&oacute;n v&aacute;lida. Por favor int&eacute;ntelo de nuevo</div>';
      break;

      case 10:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Usuario no v&aacute;lido. Por favor int&eacute;ntelo de nuevo</div>';
      break;

      case 11:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Documento de usuario ya existe en los registros. Por favor chequee sus datos</div>';
      break;

      case 12:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: No se actualiz&oacute; el registro seleccionado</div>';
      break;

      case 13:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: No se elimin&oacute; el registro seleccionado</div>';
      break;

      case 14:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Se excedi&oacute; el m&aacute;ximo de digitos permitidos para el documento</div>';
      break;

      case 15:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Se excedi&oacute; el m&aacute;ximo de digitos permitidos para el t&eacute;lefono</div>';
      break;

      case 16:
        echo '<div class="alert alert-danger">ATENCI&Oacute;N: Datos no registrados por incompatibilidad con la Base de Datos</div>';
      break;
    
      default:
        echo '<div class="alert alert-danger">Por favor no intente modificar las variable de la URI. Gracias!</div>';
        break;
    endswitch;
  endif;

  if (isset($succ)):
    unset($err);
    switch ($succ):
      case 1:
        echo '<div class="alert alert-info">Datos registrados satisfactoriamente</div>';
        break;
      case 2:
        echo '<div class="alert alert-success">Registro actualizado satisfactoriamente</div>';
        break;
      case 3:
        echo '<div class="alert alert-success">Registro borrado satisfactoriamente</div>';
        break;
      default:
        echo '<div class="alert alert-danger">Por favor no juegue con las variable de la URI. Gracias!</div>';
        break;
    endswitch;
  endif;

  if (isset($errorr)) :
      echo '<div class="alert alert-danger">Error Iniciando sesi&oacute;n!</div>';
  endif;
