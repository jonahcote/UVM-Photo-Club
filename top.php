<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'],ENT_QUOTES, "UTF-8");
$path_parts = pathinfo($phpSelf);
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recycling - Making the World a Better Place </title>
        <meta name="author" content="Murphy Peisel">
        <meta name="description" content="A website containing Murphy's third
              lab about the environment, recycling awareness, and what we can
              all do to make the world a better place for cs 008 at UVM.">
        <link rel="stylesheet"
              href="css/custom.css?version=<?php print time(); ?>"
              type="text/css">
        <link rel="stylesheet"
              media="(max-width: 648px)"
              href="css/custom-tablet.css?version=<?php print time(); ?>"
              type="text/css">
        <link rel="stylesheet"
              media="(max-width: 500px)"
              href="css/custom-phone.css?version=<?php print time(); ?>"
              type="text/css">
        <link rel="icon" type="image/jpg" href="image/logo.jpg">
    </head>
    
    <?php
    print('<body class="grid-layout" id="' . $path_parts['filename'] . '">');
    ?>
    
    <!-- ######################## START OF BODY ######################## -->
    <?php
    include 'connect-DB.php';
    print PHP_EOL;
    include 'header.php';
    print PHP_EOL;
    include 'nav.php';
    ?>