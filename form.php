<?php include "top.php";

// initialize variables
$dataIsGood = false;
$first = '';
$last = '';
$email = '';
$age = 18;
$recycle = '';
$compost = '';
$reuse = '';
$light = '';
$transit = '';
$issue = '';
$comments = '';

// create sanitizing functions
function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    }
    else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

function verifyNum($testString) {
    return (preg_match ("/^([[:digit:]])*$/", $testString));
}
?>
<main>
    <article>

        <!-- DIFFERING PART -->
        <h2 class="formshadow">Survey</h2>
        <figure class="formimage">
            <img alt="Lots of trash" src="image/survey.jpg">
            <figcaption>
                <cite> Source: <a href="https://tinyurl.com/yxd7wv8d" 
                                  target="_blank"> icmi.com</a></cite>
            </figcaption>
        </figure>

        <?php
        print '<p>Post Array:</p>:<p><pre>';
        print_r($_POST);
        print'</pre>';
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dataIsGood = true;
            
            // server side sanitization
            $email = getData("txtEmail");
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $first = getData("txtFirstName");
            $last = getData("txtLastName");
            $age = (int) getData("numAge");
            $recycle = getData("radRecycle");
            $compost = (int) getData("chkCompost");
            $reuse = (int) getData("chkReuse");
            $light = (int) getData("chkLight");
            $transit = (int) getData("chkTransit");
            $issue = getData("lstIssue");
            $comments = getData("txtComments");
            
            // server side validation
            if ($first =="") {
                print '<p class="mistake">Please enter your first name.</p>' . PHP_EOL;
                $dataIsGood = false;
            } elseif (!verifyAlphaNum($first)) {
                print '<p class="mistake">Your first name contains characters'
                . ' that are not allowed. Only use letters, numbers, hyphens
                    and a space.</p>' . PHP_EOL;
                $dataIsGood = false;  
            }
            
            if ($last =="") {
                print '<p class="mistake">Please enter your last name.</p>' . PHP_EOL;
                $dataIsGood = false;
            } elseif (!verifyAlphaNum($last)) {
                print '<p class="mistake">Your last name contains characters'
                . ' that are not allowed. Only use letters, numbers, hyphens
                    and a space. </p>' . PHP_EOL;
                $dataIsGood = false;  
            }
            
             if ($age =="") {
                print '<p class="mistake">Please enter your age.</p>' . PHP_EOL;
                $dataIsGood = false;
            } elseif (!verifyNum($age)) {
                print '<p class="mistake">Your age contains characters'
                . ' that are not allowed. Only use numbers.</p>' . PHP_EOL;
                $dataIsGood = false;
            }
            
            if ($recycle != 'Yes' AND $recycle != 'Sometimes' AND $recycle !='No') {
                print '<p class="mistake">Please choose a valid option for recycling.</p>' . PHP_EOL;
                $dataIsGood = false;
            }
            
            if ($issue != 'pollution' AND $issue != 'globalwarming' AND
                    $issue !='speciesextinction' AND $issue != 'deforestation') {
                print '<p class="mistake">Please choose a valid option for your most important issue.</p>' . PHP_EOL;
                $dataIsGood = false;
            }
            
            $totalChecked = 0;
            if ($compost != 1) {
                $compost = 0;
            }
            $totalChecked += $compost;
            
            if ($reuse != 1) {
                $reuse = 0;
            }
            $totalChecked += $reuse;
            
            if ($light != 1) {
                $light = 0;
            }
            $totalChecked += $light;
            
            if ($transit != 1) {
                $transit = 0;
            }
            $totalChecked += $transit;
            
            
            if ($totalChecked == 0) {
                print '<p class="mistake">Please choose at least one checkbox.</p>';
                $dataIsGood = false;
            }
            
            if (!verifyAlphaNum($comments)) {
                print '<p class="mistake">Your comment contains characters'
                . ' that are not allowed. Only use letters, numbers, hyphens
                    and a space. </p>' . PHP_EOL;
            }
            
            if ($dataIsGood) {
                try {
                    $sql = 'INSERT INTO tblRecyclingSurvey (fldFirstname, fldLastname,
                        fldEmail, fldAge, fldRecycle, fldCompost, fldReuse, fldLight,
                        fldTransit, fldIssue, fldComments)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                        $statement = $pdo->prepare($sql);
                        $params = array($first, $last, $email, $age, $recycle,
                            $compost, $reuse, $light, $transit, $issue, $comments);
                        
                        if ($statement->execute($params)) {
                            print '<p>Record was successfully saved. Thank you!</p>';
                            $to = $email;
                            $from = 'Murphy Peisel CS008 <mpeisel@uvm.edu>';
                            $subject = 'Recycling Mailing List';
                            
                            $mailMessage = '<p style="font: 16pt verdana;">Thank you ';
                            $mailMessage .= 'for signing up for my mailing list!</p><p></p>';
                            $mailMessage .= '<p>Thanks again,</p><p>Murphy Peisel</p>';
                            
                            $headers = "MIME-Version 1.0\r\n";
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
            print '<h2>Thank you! Your information was successfully received!</h2>';
        }
        ?>
        <form action="#" method="POST">
            <fieldset class="contact">
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
                <p>
                    <label for="numAge">What is your age?</label>
                    <input type="number"
                           name="numAge"
                           id="numAge"
                           min="1"
                           max="120"
                           value="<?php print $age; ?>"
                           required>
                </p>
            </fieldset>

            <fieldset class="recycle">
                <legend>Do You Recycle?</legend>
                <p>
                    <label for="radYes">Yes</label>
                    <input type="radio" name="radRecycle" id="radYes" value="Yes" required
                    <?php
                    if ($recycle == 'Yes') { print 'checked'; }
                    ?>>
                </p>
                <p>
                    <label for="radSometimes">Sometimes</label>
                    <input type="radio" name="radRecycle" id="radSometimes" value="Sometimes"
                    <?php 
                    if ($recycle == 'Sometimes') { print 'checked'; }
                    ?>>
                </p>
                <p>
                    <label for="radNo">No</label>
                    <input type="radio" name="radRecycle" id="radNo" value="No"
                    <?php
                    if ($recycle == 'No') { print 'checked'; }
                    ?>>
                </p>
            </fieldset>

            <fieldset class="helping">
                <legend>How Are You Helping? (choose at least 1)</legend>
                <p>
                    <label for="chkCompost">I compost</label>
                    <input type="checkbox" name="chkCompost" id="chkCompost" value="1"
                    <?php if ($compost == 1) { print 'checked'; }
                    ?>>
                </p>
                <p>
                    <label for="chkReuse">I use reusable bags and cups</label>
                    <input type="checkbox" name="chkReuse" id="chkReuse" value="1"
                    <?php if ($reuse == 1) { print 'checked'; }
                    ?>>
                </p>
                <p>
                    <label for="chkLight">I turn off the lights when not in the room
                    </label>
                    <input type="checkbox" name="chkLight" id="chkLight" value="1"
                    <?php if ($light == 1) { print 'checked'; }
                    ?>>
                </p>
                <p>
                    <label for="chkTransit">I use public transit whenever possible
                    </label>
                    <input type="checkbox" name="chkTransit" id="chkTransit" value="1"
                    <?php if ($transit == 1) { print 'checked'; }
                    ?>>
                </p>
            </fieldset>

            <fieldset class="important">
                <legend>Which Issue Is Most Important To You?</legend>
                <select name="lstIssue" size="1">
                    <option <?php if ($issue =="polution") { print ' selected="selected"'; }?>
                        value="pollution">Pollution</option>
                    <option <?php if ($issue =="globalwarming") { print 'selected="selected"' ; }?>
                        value="globalwarming">Global warming</option>
                    <option <?php if ($issue =="speciesextinction") { print 'selected="selected"'; }?>
                        value="speciesextinction">Species extinction</option>
                    <option <?php if ($issue =="deforestation") { print 'selected="selected"'; }?>
                        value="deforestation">Deforestation</option>
                </select>
            </fieldset>

            <fieldset class="comments">
                <legend>Additional Comments</legend>
                <textarea name="txtComments" rows="4" cols="35">
                    <?php print $comments ?>
                </textarea>
                
            </fieldset>

            <fieldset class="finish">
                <p>
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Finish">
                </p>
            </fieldset>
        </form>
        <!-- DIFFERING PART -->
    </article>
</main>

<?php include "footer.php"; ?>

</body>
</html>