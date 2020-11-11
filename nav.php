
<!-- #################### MAIN NAVIGATION ############################## -->
<nav>
    <a class ="<?php
    if ($path_parts['filename'] == 'index') {
        print('activePage');
    }
    ?>" href="index.php">Home</a>

    <a class ="<?php
    if ($path_parts['filename'] == 'detail') {
        print('activePage');
    }
    ?>" href="detail.php">Why We Recycle</a>

    <a class ="<?php
    if ($path_parts['filename'] == 'form') {
        print('activePage');
    }
    ?>" href="form.php">Survey</a>

    <a class ="<?php
    if ($path_parts['filename'] == 'contest') {
        print('activePage');
    }
    ?>" href="contest.php">Contest</a>
    
    
</nav>