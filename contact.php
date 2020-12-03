<?php include "top.php"; ?>
<title>Add Map</title>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAoeZJ6Yki5l1ILAfASFH5vLmGBbQQGPc&callback=initMap&libraries=&v=weekly"
    defer
></script>
<style type="text/css">
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
</style>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        const uluru = {lat: -25.344, lng: 131.036};
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }
</script>

<h3>My Google Maps Demo</h3>
<!--The div element for the map -->
<div id="map"></div>
<!-- END OF MAP STUFF -->

<table>
    <caption>People To Contact For Info</caption>]
    <tr>
        <th>Name:</th>
        <th>Email:</th>
        <th>Position:</th>
    </tr>
    <?php
    $sql = 'SELECT fldName, fldEmail, fldPosition FROM tblPhotoMemberInfo';

    $statement = $pdo->prepare($sql);
    $statement->execute();

    $records = $statement->fetchAll();
    foreach ($records as $record) {
        print '<tr>';
        print '<td>' . $record['fldName'] . '</td>';
        print '<td>' . $record['fldEmail'] . '</td>';
        print '<td>' . $record['fldPosition'] . '</td>';
        print '</tr>' . PHP_EOL;
    }
    ?>
</table>
<h3>PLEASE NOTE:</h3>
<p><b>Please do not actually contact anyone other than Murphy Peisel, as the club
    does not formally exist yet and there are no commitments as of right now. 
    Murphy plans on creating the University of Vermont Photography Club
    in the spring semester of 2021. Until then, please enjoy the website
    and feel to email Murphy Peisel if you have any interest in joining
    or any questions. Thank you for taking the time to check us out! 
    Capere Lumina - Catch lights!</b></p>

</main>

<?php include "footer.php"; ?>

</body>
</html>