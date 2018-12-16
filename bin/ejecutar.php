<?php
defined('WEBSITEPATH') OR exit('No direct script access allowed');
//Cleaning Form´s variables
  $name = isset($_POST['name']) ? trim(filter_input(INPUT_POST, 'name', $filter = FILTER_SANITIZE_STRING)) : "";
  $lastname = isset($_POST['lastname']) ? trim(filter_input(INPUT_POST, 'lastname', $filter = FILTER_SANITIZE_STRING)) : "";
  $document = isset($_POST['document']) ? trim(filter_input(INPUT_POST, 'document', $filter = FILTER_VALIDATE_INT)) : "";
  $email = isset($_POST['email']) ? trim(filter_input(INPUT_POST, 'email', $filter = FILTER_SANITIZE_EMAIL)) : "";
  $telf = isset($_POST['telf']) ? trim(filter_input(INPUT_POST, 'telf', $filter = FILTER_VALIDATE_INT)) : "";
  $message = isset($_POST['message']) ? trim(filter_input(INPUT_POST, 'message', $filter = FILTER_SANITIZE_STRING)) : "";
  $country = isset($_POST['country']) ? trim(filter_input(INPUT_POST, 'country', $filter = FILTER_VALIDATE_INT)) : "";
  $accion = isset($_POST['accion']) ? trim(filter_input(INPUT_POST, 'accion', $filter = FILTER_SANITIZE_STRING)) : "";

//Validating Form´s variables
  if(!isset($name)){
      header('Location: index.php?pg=start&er=1');
  }else{
    if(!isset($lastname)){
      header('Location: index.php?pg=start&er=2');
    }else{
     if(!isset($document)){
      header('Location: index.php?pg=start&er=3');
      }else{
        if(!isset($email)){
          header('Location: index.php?pg=start&er=4');
        }else{
          if(!isset($telf)){
            header('Location: index.php?pg=start&er=5');
          }else{
            if(!isset($country)){
              header('Location: index.php?pg=start&er=6');
            }else{
              if(!isset($message)){
                header('Location: index.php?pg=start&er=7');
              }else{
                if(!isset($accion)){
                  header('Location: index.php?pg=start&er=9');
                }

                $user = new controllerUsers();
                switch($accion){
                  case "Registrar":
                    if(strlen($document) == 0){ header('Location: index.php?pg=start&er=14');}
                    if(strlen($telf) == 0){ header('Location: index.php?pg=start&er=15');}
                    $validate = $user->validateUser($document);
                    if ($validate == 1){
                      header('Location: index.php?pg=start&er=11');
                    }
                    $respuesta = $user->createUser($document, $name, $lastname, $email, $telf, $country, $message);
                    if ($respuesta == 1){
                      header('Location: index.php?pg=start&suc=1');
                    }else{
                      header('Location: index.php?pg=start&er=16');
                    }
                  break;

                  case "Actualizar":
                    if(strlen($document) == 0) header('Location: index.php?pg=start&er=14');
                    if(strlen($telf) == 0) header('Location: index.php?pg=start&er=15');

                    $validate = $user->validateUser($document);
                    if ($validate == 0){
                      header('Location: index.php?pg=start&er=10');
                    }

                    $id_user = isset($_POST['id_user']) ? trim(filter_input(INPUT_POST, 'id_user', $filter = FILTER_VALIDATE_INT)) : "";
                    if($id_user == "") header('Location: index.php?pg=start&er=10');
                    $actualizar = $user->updateUser($document, $name, $lastname, $email, $telf, $country, $message, $id_user);
                    if ($actualizar == 1){
                      header('Location: index.php?pg=modificar&id='.$id_user.'&suc=2');
                    }else{
                      header('Location: index.php?pg=start&id='.$id_user.'&er=12');
                    }
                  break;

                  case "Eliminar":
                    $validate = $user->validateUser($document);
                    if ($validate == 0){
                      header('Location: index.php?pg=start&er=10');
                    }
                    $id_user = isset($_POST['id_user']) ? trim(filter_input(INPUT_POST, 'id_user', $filter = FILTER_VALIDATE_INT)) : "";
                    if($id_user == "") header('Location: index.php?pg=start&er=10');
                    $borrar = $user->deleteUser($id_user);
                    if ($borrar == 1){
                      header('Location: index.php?pg=start&suc=3');
                    }else{
                      header('Location: index.php?pg=start&er=13');
                    }
                  break;

                  default:
                    header('Location: index.php?pg=start&er=9');
                  break;
                }
              }
            }
          }
        }
      }
    }
  }

