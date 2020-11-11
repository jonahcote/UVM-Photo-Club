<?php
include 'top.php'
?>

<main>
    <p>Create Table SQL</p>
    
    <pre>
        CREATE TABLE tblData(
        pmkCategoryId INT AUTO_INCREMENT PRIMARY KEY,
        fldPathway VARCHAR(200),
        fld2010 VARCHAR(200),
        fld2015 VARCHAR(200),
        fld2016 VARCHAR(200),
        fld2017 VARCHAR(200)
    );

    INSERT INTO tblData (fldPathway, fld2010, fld2015, fld2016, fld2017) VALUES

    ('Total Food Waste', '35,740', '39,730', '40,310', '40,670'),

    ('Composted', '970', '2,100', '2,150', '2,570'),

    ('Landfilled', '28,620', '30,250', '30,680', '30,630');

    CREATE TABLE tblRecyclingSurvey (
        pmkReyclingSurveyId INT AUTO_INCREMENT PRIMARY KEY,
        fldFirstName VARCHAR(50),
        fldLastName VARCHAR(50),
        fldEmail VARCHAR(75),
        fldAge VARCHAR(50),
        fldRecycle VARCHAR(50),
        fldCompost TINYINT(1),
        fldReuse TINYINT(1),
        fldLight TINYINT(1),
        fldTransit TINYINT(1),
        fldIssue VARCHAR(50),
        fldComments TEXT
    )
    
    INSERT INTO tblRecyclingSurvey
    (fldFirstName, fldLastName, fldEmail, fldAge,
    fldRecycle, fldCompost, fldReuse, fldLight,
    fldTransit, fldIssue, fldComments)
    VALUES
    ('Murphy', 'Peisel', 'mpeisel@uvm.edu', '19',
    'Yes', '1', '1', '1', '1', 'globalwarming', 'no comments')

    </pre>
</main>
<?php include 'footer.php'; ?>
</body>
</html>