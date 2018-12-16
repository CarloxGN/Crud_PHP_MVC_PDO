<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$title; ?></title>
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Links -->
<link href="<?=WEBSITEPATH;?>images/favicon.ico"  rel="shortcut icon" type="image/x-icon" />
<link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=WEBSITEPATH;?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=WEBSITEPATH;?>css/style_tab.css" rel="stylesheet" type="text/css" />
<!----webfonts---->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css" media="screen" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script type="text/JavaScript" src="<?=WEBSITEPATH;?>js/forms.js"></script>
<script src="<?=WEBSITEPATH;?>js/hidediv.js" charset="utf-8"></script>
<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#blogtable').DataTable();
});

addEventListener("load", function() {
  setTimeout(hideURLbar, 0);
}, false);

function hideURLbar(){
  window.scrollTo(0,1);
}
</script>
<!-- -//End-click-drop-down-menu--- -->
