<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/icons.js"></script>
	<script type="text/javascript" src="js/functions.js" ></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
	<script type='text/javascript'>
    function solonumeros(e)
    {
      var key = window.Event ? e.which: e.keyCode
      return (key >= 48 && key <= 57)
    }
    function sololetras()
    {
        if (event.keyCode >45 && event.keyCode  <57) event.returnValue = false;
    }
    function abrir() {
        document.getElementById("vent").style.display="block";
        document.getElementById("oscurecer_medidor").style.display="block";
    }
    function cerrar() {
        document.getElementById("vent").style.display="none";
        document.getElementById("oscurecer_medidor").style.display="none";
    }
    </script>
	<?php include 'functions.php'; ?>
