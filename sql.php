<?php
include 'top.php'
?>

<main>
    <h3>Create Table SQL For Form</h3>
    <pre>
    <code>
    CREATE TABLE tblPhotoContact (
        pmkPhotoContact INT AUTO_INCREMENT PRIMARY KEY,
        fldFirstName VARCHAR(50),
        fldLastName VARCHAR(50),
        fldEmail VARCHAR(75),
        fldExperience VARCHAR(50),
        fldDigital TINYINT(1),
        fldFilm TINYINT(1),
        fldInstantFilm TINYINT(1)
    );
    </code>
    </pre>
    <h3>Create Table SQL To Display Data</h3>
    <pre>
    CREATE TABLE tblPhotoMemberInfo(
    pmkMemberId INT AUTO_INCREMENT PRIMARY KEY,
    fldName VARCHAR(200),
    fldEmail VARCHAR(200),
    fldPosition VARCHAR(200)
    );
    </pre>

    <h3>Insert Member Info Into Table</h3>
    <pre>
    <code>
    INSERT INTO tblPhotoMemberInfo (fldName, fldEmail, fldPosition) VALUES
    ('Murphy Peisel', 'Murphy.Peisel@uvm.edu', 'Grandmaster'),
    ('Jonah Cote', 'Jonah.Cote@uvm.edu', 'COO'),
    ('Brandon Schoenfeld', 'Brandon Schoenfeld', 'Intern'),
    ('Fiona Duckworth', 'Fiona.Duckworth@uvm.edu', 'Intern\'s Intern'),
    ('Adam Zuchowski', 'Adam.Zuchowski@uvm.edu', 'Waterboy');
    </code>
    </pre>

    <h3>Select Statement For Printing Table Data</h3>
    <pre>
    <code>
    SELECT fldName, fldEmail, fldPosition FROM tblPhotoMemberInfo
    </code>
    </pre>


</main>
<?php include 'footer.php'; ?>
</body>
</html>