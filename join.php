  
<?php
include "top.php";

// initialize variables
$dataIsGood = false;
$first = '';
$last = '';
$email = '';
$experience = '';
$digital = '';
$film = '';
$instantFilm = '';

// create sanitizing functions
function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    return (preg_match("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

print '<p>(REMOVE WHEN DONE) Post Array:</p>:<p><pre>'; // REMOVE WHEN DONE
print_r($_POST);
print'</pre>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataIsGood = true;

    // server side sanitization
    $email = getData("txtEmail");
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $first = getData("txtFirstName");
    $last = getData("txtLastName");
    $experience = getData("radExperience");
    $digital = (int) getData("chkDigital");
    $film = (int) getData("chkFilm");
    $instantFilm = (int) getData("chkInstantFilm");


    // server side validation
    if ($first == "") {
        print '<p class="mistake">Please enter your first name.</p>' . PHP_EOL;
        $dataIsGood = false;
    } elseif (!verifyAlphaNum($first)) {
        print '<p class="mistake">Your first name contains characters'
                . ' that are not allowed. Only use letters, numbers, hyphens
                    and a space.</p>' . PHP_EOL;
        $dataIsGood = false;
    }

    if ($last == "") {
        print '<p class="mistake">Please enter your last name.</p>' . PHP_EOL;
        $dataIsGood = false;
    } elseif (!verifyAlphaNum($last)) {
        print '<p class="mistake">Your last name contains characters'
                . ' that are not allowed. Only use letters, numbers, hyphens
                    and a space. </p>' . PHP_EOL;
        $dataIsGood = false;
    }
    
    if ($email == "") {
        print '<p class="mistake">Please enter your email address.</p>';
        $dataIsGood = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        print '<p class="mistake">Your email address appears to be incorrect.</p>';
        $dataIsGood = false;
    }
    
    if ($experience != 'Master' AND $experience != 'Expert' AND 
            $experience !='Intermediate' AND $experience != 'Novice') {
        print '<p class="mistake">Please choose a valid option for experience.</p>' . PHP_EOL;
        $dataIsGood = false;
    }

    $totalChecked = 0;
    if ($digital != 1) {
        $digital = 0;
    }
    $totalChecked += $digital;
    
    if ($film != 1) {
        $film = 0;
    }
    $totalChecked += $film;
    
    if ($instantFilm != 1) {
        $instantFilm = 0;
    }
    $totalChecked += $instantFilm;
    
    if ($totalChecked == 0) {
        print '<p class="mistake">Please choose at least one checkbox.</p>';
        $dataIsGood = false; 
    }
    if ($dataIsGood) {
        try {
            $sql = 'INSERT INTO tblPhotoContact
                (fldFirstName, fldLastName, fldEmail,
                fldExperience, fldDigital, fldFilm, fldInstantFilm)
                VALUES
                (?, ?, ?, ?, ?, ?, ?)';
            $statement = $pdo->prepare($sql);
            $params = array($first, $last, $email, $experience,
                $digital, $film, $instantFilm);
            
            if ($statement->execute($params)) {
                print '<p>Record was successfully saved. Thank you!</p>';
                
                $to = $email;
                $from = 'Unofficial UVM Photography Club <mpeisel@uvm.edu>';
                $subject = 'UVM Photography Club Form';
                
                $mailMessage = '<html><body>';
                $mailMessage .= '<p>test</p>';
                $mailMessage .= '</body></html>';
                
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
                $headers .= "From: " . $from . "\r\n";
                
                $mailSent = mail($to, $subject, $mailMessage, $headers);
                
                if ($mailSent) {
                    print "<p>Email was sent! Here is what the email said:</p>";
                    print $mailMessage;
                }
            } else {
                    print '<p>Record was NOT successfully saved.</p>';
            }
                
        } catch (Exception $e) {
                    print '<p>Couldn\'t insert the record, please contact the site owner.</p>';
        }         
    }            
} // form submitted
if ($dataIsGood) {
    print '<h2>Thank you for filling out the form! Your information was '
    . ' successfully received! We will contact you about your response'
            . ' shortly!</h2>';
}
?>


<main>
    <h1>CHANGE EMAIL CONTENTS!!!</h1>
    <article>
        <form action="#" method="POST">
            <fieldset class="userinfo">
                <legend>Contact Information</legend>
                <p>
                    <label for="txtFirstName">First Name:</label>
                    <input type="text"
                           name="txtFirstName"
                           id="txtFirstName"
                           value="<?php print $first; ?>"
                           required>
                </p>
                <p>
                    <label for="txtLastName">Last Name:</label>
                    <input type="text"
                           name="txtLastName"
                           id="txtLastName"
                           value="<?php print $last; ?>"
                           required>
                </p>
                <p>
                    <label for="txtEmail">Email Address:</label>
                    <input type="email"
                           name="txtEmail"
                           id="txtEmail"
                           value ="<?php print $email; ?>"
                           required>
                </p>
            </fieldset>
            <fieldset class="experience">
                <legend>How Experienced Are You?</legend>
                <p>
                    <label for="radMaster">Master</label>
                    <input type="radio" name="radExperience" id="radMaster" value="Master" required
                    <?php
                    if ($experience == 'Master') {
                        print 'checked';
                    }
                    ?>>
                </p>
                <p>
                    <label for="radExpert">Expert</label>
                    <input type="radio" name="radExperience" id="radExpert" value="Expert" required
                    <?php
                    if ($experience == 'Expert') {
                        print 'checked';
                    }
                    ?>>
                </p>
                <p>
                    <label for="radIntermediate">Intermediate</label>
                    <input type="radio" name="radExperience" id="radIntermediate" value="Intermediate"
                    <?php
                    if ($experience == 'Intermediate') {
                        print 'checked';
                    }
                    ?>>
                </p>
                <p>
                    <label for="radNovice">Novice</label>
                    <input type="radio" name="radExperience" id="radNovice" value="Novice"
                    <?php
                    if ($experience == 'Novice') {
                        print 'checked';
                    }
                    ?>>
                </p>
            </fieldset>
            <fieldset class="phototypes">
                <legend>What Types of Photography Are You Interested In? (choose at least 1)</legend>
                <p>
                    <label for="chkDigital">Digital</label>
                    <input type="checkbox" name="chkDigital" id="chkDigital" value="1"
                    <?php if ($digital == 1) { print 'checked'; }
                    ?>>
                </p>
                <p>
                    <label for="chkFilm">Film (Small/Medium/Large Format)</label>
                    <input type="checkbox" name="chkFilm" id="chkFilm" value="1"
                    <?php if ($film == 1) { print 'checked'; }
                    ?>>
                </p>
                <p>
                    <label for="chkInstantFilm">Instant Film</label>
                    <input type="checkbox" name="chkInstantFilm" id="chkInstantFilm" value="1"
                    <?php if ($instantFilm == 1) { print 'checked'; }
                    ?>>
                </p>
            </fieldset>
            <fieldset class="finish">
                <p>
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Finish">
                </p>
            </fieldset>
        </form>

    </article>
</main>

<?php include "footer.php"; ?>
</body>
</html>