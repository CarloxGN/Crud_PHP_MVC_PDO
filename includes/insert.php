<?php
//Cleaning Form´s variables
  $name = isset($_POST['name']) ? trim(filter_input(INPUT_POST, 'name', $filter = FILTER_SANITIZE_STRING)) : "";
  $lastname = isset($_POST['lastname']) ? trim(filter_input(INPUT_POST, 'lastname', $filter = FILTER_SANITIZE_STRING)) : "";
  $document = isset($_POST['document']) ? trim(filter_input(INPUT_POST, 'document', $filter = FILTER_VALIDATE_INT)) : "";
  $email = isset($_POST['email']) ? trim(filter_input(INPUT_POST, 'email', $filter = FILTER_SANITIZE_EMAIL)) : "";
  $telf = isset($_POST['telf']) ? trim(filter_input(INPUT_POST, 'telf', $filter = FILTER_VALIDATE_INT)) : "";
  $message = isset($_POST['message']) ? trim(filter_input(INPUT_POST, 'message', $filter = FILTER_SANITIZE_STRING)) : "";

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
            if(!isset($message)){
              header('Location: index.php?pg=start&er=6');
            }else{
              $registrar = new controllerUsers();
              $registrar->createUser($document, $name, $lastname, $email, $telf, $message);
              if ($registrar == 1){
                header('Location: index.php?pg=start&suc=1');
              }else{
                header('Location: index.php?pg=start&er=7');
              }
            }
          }
        }
      }
    }
  }
