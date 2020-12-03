
<!-- #################### MAIN NAVIGATION ############################## -->
<nav>
    <a class ="<?php
    if ($path_parts['filename'] == 'index') {
        print('activePage');
    }
    ?>" href="index.php">Home</a>
    
    <a class ="<?php
    if ($path_parts['filename'] == 'gallery') {
        print('activePage');
    }
    ?>" href="gallery.php">Gallery</a>
    
    <a class ="<?php
    if ($path_parts['filename'] == 'about') {
        print('activePage');
    }
    ?>" href="about.php">About</a>
    
    <a class ="<?php
    if ($path_parts['filename'] == 'contact') {
        print('activePage');
    }
    ?>" href="contact.php">Contact</a>
    
    <a class ="<?php
    if ($path_parts['filename'] == 'join') {
        print('activePage');
    }
    ?>" href="join.php">Join</a>

</nav>