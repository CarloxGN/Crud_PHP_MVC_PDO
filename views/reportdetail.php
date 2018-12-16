<?php
if (!isset($_SESSION['id_level'])){
  header ('Location: ?pg=login&er=4');
  exit;
}elseif($_SESSION['id_level'] != 2){
  header ('Location: ?pg=start&er=25');
  exit;
}else{
  $post = filter_input(INPUT_POST, 'create', $filter = FILTER_SANITIZE_STRING);
  $procesar = filter_input(INPUT_POST, 'procesar', $filter = FILTER_SANITIZE_STRING);

  if (isset($procesar) && $procesar == "Procesar"){
    include 'bin/report.process.php';
    exit;
  }elseif (isset($post) && $post == "Procesar Reporte"){
      // Report Information
      $id               = substr(filter_input(INPUT_POST, 'id',$filter=FILTER_VALIDATE_INT), 0, 11);
      $title1           = filter_input(INPUT_POST, 'title', $filter = FILTER_SANITIZE_STRING);
      $tracking         = abs(trim(filter_input(INPUT_POST, 'tracking', $filter = FILTER_SANITIZE_STRING)));
      $total            = filter_input(INPUT_POST, 'cost', $filter = FILTER_VALIDATE_INT);
      $transaction      = substr(filter_input(INPUT_POST, 'transaction', $filter = FILTER_VALIDATE_INT), 0, 2);
      $banc             = filter_input(INPUT_POST, 'banc', $filter = FILTER_SANITIZE_STRING);
      $date_transaction = substr(filter_input(INPUT_POST, 'date_transaction', $filter = FILTER_SANITIZE_STRING), 0, 20);
      $observation      = substr(filter_input(INPUT_POST, 'observation', $filter = FILTER_SANITIZE_STRING), 0, 150);
      if($id == '' || $title1 == '' || $tracking == '' || $total == '' || $transaction == '' || $banc == ''){
        header ('Location: ?pg=start&er=5');
      }
    // Invoice Information
    $same             = substr(filter_input(INPUT_POST, 'same', $filter=FILTER_VALIDATE_INT), 0, 1);
    $name_invoice     = filter_input(INPUT_POST, 'name_invoice', $filter = FILTER_SANITIZE_STRING);
    $rif_invoice      = filter_input(INPUT_POST, 'rif_invoice', $filter = FILTER_SANITIZE_STRING);
    $address_invoice  = filter_input(INPUT_POST, 'address_invoice', $filter = FILTER_SANITIZE_STRING);
    $phone_invoice    = filter_input(INPUT_POST, 'phone_invoice', $filter = FILTER_SANITIZE_STRING);

    if ($same == ''){
      if($name_invoice == '' || $rif_invoice == '' || $address_invoice == ''){
        header ('Location: ?pg=createreport&er=5&id='.$id.'&title='.$title1);
        exit;
      }
    }else{
      $name_invoice     = $_SESSION['username'];
      $rif_invoice      = $_SESSION['text_document'].$_SESSION['document'];
      $address_invoice  = $_SESSION['address_user'];
      $phone_invoice    = $_SESSION['phone_user'];
    }

    $datos = new controllerReports();
    $validar = $datos->listReportColumn('track_report',$tracking);
    
    if($validar == true){
      header ('Location: ?pg=createreport&er=44&id='.$id.'&title='.$title1);
      exit;
    }

    $datetime             = new DateTime();
    $date_report          = $datetime->format('d/m/Y');
    $date_full_report     = $datetime->format('Y/m/d H:i:s');
    $date_full_report_mod = strtotime($date_full_report);
    $date_report          = date('d/m/Y' , strtotime ( '-6 hour' ,$date_full_report_mod));

    $hour_report          = $datetime->format('H:i:s');
    $hour_report_mod      = strtotime ( '-6 hour' , strtotime ( $hour_report ) ) ;
    $hour_report          = date ( 'H:i:s' , $hour_report_mod );

    $date_transaction     = str_replace('/','-', $date_transaction.':00');
    $date_transaction_mod = strtotime($date_transaction);

    if ($date_transaction_mod >= $hour_report_mod ){
      header ('Location: ?pg=createreport&er=47&id='.$id.'&title='.$title1);
    }
    
    $code_report  = substr($_SESSION['text_document'].$_SESSION['document'],-4,4).'-'.dechex(rand(1000,2000000));

    //$iva_div      = $_SESSION['iva']/100;
    //$cost         = $total / (1 + $iva_div);
    //$iva          = $cost * $iva_div;

    $title        = $_SESSION['name_site'].' | Conformaci&oacute;n datos de Informe de pago: '.$title1;
    ?>
  <!DOCTYPE html>
  <html>
  <head>
  <?php
    include_once('includes/head.php');
  ?>
  </head>
  <body>
    <div class="content">
      <div class="wrap">
      <div class="contact-info">
 <?php include 'includes/formreport.php'; ?>
</div>
<hr style="border-top: 1px solid #8c8b8b;">
  <form enctype="multipart/form-data" method="post" action="<?=WEBSITEPATH;?>?pg=reportdetail"">
    <div class="clear"></div><br>
      Imagen del reporte de pago:
      <div class="input-group">
      <label class="input-group-btn">
      <span class="btn btn-primary" style="font-size:14px;">Browse&hellip; <input type="file" style="display: none;" name="image" id="file" class="input-group">
      </span>
      </label>
      <input type="text" class="form-control" readonly name="name_image" style="font-size:10px;" id="media">
      </div>
      <ul>
        <li style="font-size: 10px; color: blue">
        * S&oacute;lo archivos "jpg/png/bmp/gif" / Resoluci&oacute;n m&aacute;x.: 1600x1200 pixels / Tama&ntilde;o m&aacute;x.: 2.5MB.
        </li>
        <li style="font-size: 10px; color:red;">
        * La captura de pantalla de la transacci&oacute;n y su inclusi&oacute;n en este formulario no es obligatorio, pero supone un buen soporte para el reporte del pago.
        </li>
     <div class="clear"></div><br><hr style="border-top: 1px solid #8c8b8b;"> <div class="clear" ></div><br>

      <input type="hidden" name="id" value="<?=$id;?>" required>
      <input type="hidden" name="tracking" value="<?=$tracking;?>" required>
      <input type="hidden" name="banc" value="<?=$banc;?>" required>
      <input type="hidden" name="name_invoice" value="<?=$name_invoice;?>" required>
      <input type="hidden" name="rif_invoice" value="<?=$rif_invoice;?>" required>
      <input type="hidden" name="address_invoice" value="<?=$address_invoice;?>" required>
      <input type="hidden" name="phone_invoice" value="<?=$phone_invoice;?>" required>
      <input type="hidden" name="date_report" value="<?=$date_report.' '.$hour_report;?>" required>
      <input type="hidden" name="id_transaction" value="<?=$transaction;?>" required>
      <input type="hidden" name="date_transaction" value="<?=$date_transaction;?>" required>
      <input type="hidden" name="code" value="<?=$code_report;?>" required>
      <input type="hidden" name="total" value="<?=$total;?>" required>
      <input type="hidden" name="title" value="<?=$title1;?>" required>
      <input type="hidden" name="observation" value="<?=$observation;?>" required>

    <div align="center">
      <h5>
        <a class="btn btn-primary" href="?pg=createreport&id=<?=$id;?>&title=<?=$title1;?>&id=<?=$id;?>&tracking=<?=$tracking;?>&date_transaction=<?=dateswap($date_transaction).':00';
        ?>" onclick="return confirm('¿Desea editar este Informe?');">Editar</a>
        <input class="btn btn-primary" name="procesar" value ="Procesar" type="submit" onclick="return confirm('¿Desea procesar este Informe?');">
      </h5>
    </div>
  </form>
<p>&nbsp;</p><p>&nbsp;</p>
</div>
</div>
</div>
    <!-- start-footer -->
    <?php include_once 'includes/footer.php' ?>
    <!-- //End-footer -->
    <!-- //End-wrap -->
      <div class="clear"></div>
      <div class="clear"></div>
      <div class="clear"></div>
    </body>
  </html>
  <!--
  Author: W3layouts
  Author URL: http://w3layouts.com
  License: Creative Commons Attribution 3.0 Unported
  License URL: http://creativecommons.org/licenses/by/3.0/
  -->
  <?php
  }else{
    header ('Location: ?pg=start&er=5');
    exit;
  }
}
