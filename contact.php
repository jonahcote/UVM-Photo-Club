  
<?php include "top.php"; ?>
<main>
    <table>
        <caption>People To Contact For Info</caption>
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
    <p><b>Please do not actually contact anyone other
            than Murphy Peisel, as the club does not formally exist yet
            and there are no commitments as of right now. 
            Murphy plans on creating the University of Vermont Photography Club
            in the spring semester of 2021. 
            Until then, please enjoy the website
            and feel to email Murphy Peisel if you have any interest in joining
            or any questions. Thank you for taking the time to check us out! 
            Capere Lumina - Catch lights!</b></p>

</main>

<?php include "footer.php"; ?>

</body>
</html>