<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$pagename?></title>
<link rel="stylesheet" type="text/css" href="/css/reset.css">
<link href="web/css/lte/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="web/css/lte/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="web/css/lte/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="web/css/lte/AdminLTE.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">

<!--JS-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="web/js/lte/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="web/js/lte/bootstrap.min.js" type="text/javascript"></script>
<script src="web/js/main/main.js" type="text/javascript"></script>

<?=(isset($head) && is_array($head)) ? implode("\n",$head) : ''?>
</head>

<body style="background-color: rgb(241, 242, 246);" >


  <div class="container">
      <?=(isset($body) && is_array($body)) ? implode("\n",$body) : ''?>
  </div>

  <div id="footer">
    
  </div>

<?=(isset($foot) && is_array($foot)) ? implode("\n",$foot) : ''?>

</body>
</html>