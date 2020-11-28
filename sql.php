<?php
include 'top.php'
?>

<main>
    <p>Create Table SQL</p>
    
    <pre>
    CREATE TABLE tblPhotoContact (
        pmkPhotoContact INT AUTO_INCREMENT PRIMARY KEY,
        fldFirstName VARCHAR(50),
        fldLastName VARCHAR(50),
        fldEmail VARCHAR(75),
        fldExperience VARCHAR(50),
        fldDigital TINYINT(1),
        fldFilm TINYINT(1),
        fldInstantFilm TINYINT(1)
    )

    INSERT INTO tblPhotoContact
    (fldFirstName, fldLastName, fldEmail,
    fldExperience, fldDigital, fldFilm, fldInstantFilm)
    VALUES
    ('Murphy', 'Peisel', 'mpeisel@uvm.edu',
    'Intermediate', '1', '1', '1')

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