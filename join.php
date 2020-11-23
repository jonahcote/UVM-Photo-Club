  
<?php
include "top.php";

// initialize variables
$dataIsGood = false;
$first = '';
$last = '';
$email = '';

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

print '<p>Post Array:</p>:<p><pre>'; // REMOVE WHEN DONE
print_r($_POST);
print'</pre>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataIsGood = true;

    // server side sanitization
    $email = getData("txtEmail");
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $first = getData("txtFirstName");
    $last = getData("txtLastName");


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
}
?>


<main>
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
                    if ($recycle == 'Master') {
                        print 'checked';
                    }
                    ?>>
                </p>
                <p>
                    <label for="radExpert">Expert</label>
                    <input type="radio" name="radExperience" id="radExpert" value="Expert" required
                    <?php
                    if ($recycle == 'Expert') {
                        print 'checked';
                    }
                    ?>>
                </p>
                <p>
                    <label for="radIntermediate">Intermediate</label>
                    <input type="radio" name="radExperience" id="radIntermediate" value="Intermediate"
                    <?php
                    if ($recycle == 'Intermediate') {
                        print 'checked';
                    }
                    ?>>
                </p>
                <p>
                    <label for="radNovice">Novice</label>
                    <input type="radio" name="radExperience" id="radNovice" value="Novice"
                           <?php
                           if ($recycle == 'Novice') {
                               print 'checked';
                           }
                           ?>>
                </p>
            </fieldset>
        </form>

    </article>
</main>

<?php include "footer.php"; ?>
</body>
</html>