<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'],ENT_QUOTES, "UTF-8");
$path_parts = pathinfo($phpSelf);
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UVM Photography Club</title>
        <meta name="author" content="Murphy Peisel and Jonah Cote">
        <meta name="description" content="A place to host UVM's photography club where 
                                          info about joining, a gallery, and more can all be found.">
        <link rel="stylesheet"
              href="css/custom.css?version=<?php print time(); ?>"
              type="text/css">
        <link rel="stylesheet"
              media="(max-width: 750px)"
              href="css/custom-tablet.css?version=<?php print time(); ?>"
              type="text/css">
        <link rel="stylesheet"
              media="(max-width: 500px)"
              href="css/custom-phone.css?version=<?php print time(); ?>"
              type="text/css">
        <link rel="icon" type="image/jpg" href="image/logo.jpg">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&family=JetBrains+Mono&family=Averia+Serif+Libre:wght@700&display=swap" rel="stylesheet"> 
    </head>
    
    <?php
    print('<body class="grid-layout" id="' . $path_parts['filename'] . '">');
    ?>
    
    <!-- ######################## START OF BODY ######################## -->
    <?php
    include 'connect-DB.php';
    print PHP_EOL;
    include 'header.php';
    ?>