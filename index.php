<!DOCTYPE html>

<html>
<head>
    <title>CSCI E-15 P2</title>
    <meta charset='utf-8'>
    <link rel='icon' href='favicon.ico'>
    <script type='text/javascript' src='js/ps2.js'></script>
    <link rel='stylesheet' type='text/css' href='css/ps2.css'>
    <?php require('logic.php'); ?>
</head>

<body>
    <header>
        <h1>
            CSCI E-15 P2<br>
             An XKCD Style Password Generator<br>
             As Seen Through the Eyes of a Child
        </h1>
    </header>
    <div id='maincontainer'>
        <form method='post' action='index.php' id='optionsform'>
            <!--I know this could have been done using a dropdown, but I actually wanted to work on some validation-->
            <label for="numberofwords" class="formquestion">How Many Words Would You Like? (min = 1 max = 9)?:</label><input id='numberofwords' type='text' name='howmany' value='<?php echo($placeholder);?>'><br>
            <div id='numberhint' class='hint'>Only values between 1 and 9 are accepted (JS)</div>
            <div id='phpwarning'><?php echo($warning)?></div>
            <br>

            <!--Got ideas for preserving user data in this StackOverflow http://stackoverflow.com/questions/19097320/keeping-radio-buttons-checked-after-form-submit-->
            <div class="formquestion">Would you like to include a separator between words?:</div>
            <label class="radiolabel"><input type='radio' name='separator' value='yes' id='sepyes' <?php if($form['separator']!='no'){echo('checked');};?>>Yes</label>
            <label class="radiolabel"><input type='radio' name='separator' value='no' id='sepno' <?php if($form['separator']=='no'){echo('checked');};?>>No</label><br>

            <div id='sepdiv' <?php if($form['separator']=='no'){echo('style="display:none"');};?>>
                <div class='formquestion'>Use _ or - ?:</div>
                <label class="radiolabel"><input type='radio' name='sepval' value='_' <?php if($form['sepval']!='-'){echo('checked');};?>>_</label>
                <label class="radiolabel"><input type='radio' name='sepval' value='-' <?php if($form['sepval']=='-'){echo('checked');};?>> -</label><br>
            </div>

            <div class='formquestion'>Would you like to include a special character (ex: !%#)?:</div>
            <label class="radiolabel"><input type='radio' name='special' value='yes' id='charyes' <?php if($form['special']!='no'){echo('checked');};?>>Yes</label>
            <label class="radiolabel"><input type='radio' name='special' value='no' id='charno' <?php if($form['special']=='no'){echo('checked');};?>>No</label><br>

            <div id='chardiv' <?php if($form['special']=='no'){echo('style="display:none"');};?>>
                <div class='formquestion'>On the left or right?:</div>
                <label class="radiolabel"><input type='radio' name='charpos' value='left' <?php if($form['charpos']!='right'){echo('checked');};?>>Left</label>
                <label class="radiolabel"><input type='radio' name='charpos' value='right' <?php if($form['charpos']=='right'){echo('checked');};?>>Right</label><br>
            </div>

            <div class='formquestion'>Would you like to include a number?:</div>
            <label class="radiolabel"><input type='radio' name='number' value='yes' id='numyes' <?php if($form['number']!='no'){echo('checked');};?>>Yes</label>
            <label class="radiolabel"><input type='radio' name='number' value='no' id='numno' <?php if($form['number']=='no'){echo('checked');};?>>No</label><br>

            <div id='numdiv' <?php if($form['number']=='no'){echo('style="display:none"');};?>>
                <div class='formquestion'>On the left or right?:</div>
                <label class="radiolabel"><input type='radio' name='numpos' value='left' <?php if($form['numpos']!='right'){echo('checked');};?>>Left</label>
                <label class="radiolabel"><input type='radio' name='numpos' value='right' <?php if($form['numpos']=='right'){echo('checked');};?>>Right</label><br>
            </div>

            <div class='formquestion'>Would you like to capitalize each word?:</div>
            <label class="radiolabel"><input type='radio' name='camel' value='yes' id='camelyes' <?php if($form['camel']!='no'){echo('checked');};?>>Yes</label>
            <label class="radiolabel"><input type='radio' name='camel' value='no' id='camelno' <?php if($form['camel']=='no'){echo('checked');};?>>No</label><br>

            <div id='capsdiv'<?php if($form['camel']=='yes'){echo('style="display:none"');};?>>
                <div class='formquestion'>  Would you like all caps or lowercase?:</div>
                <label class="radiolabel"><input type='radio' name='caps' value='caps' <?php if($form['caps']!='lower'){echo('checked');};?>>Caps</label>
                <label class="radiolabel"><input type='radio' name='caps' value='lower' <?php if($form['caps']=='lower'){echo('checked');};?>>Lower</label><br>
            </div>
            <div class='formquestion'></div><input id='getpassword' type='submit' value='Get Password'>
        </form><br>

        <?php foreach($imagesfordiv as $key => $value)
            echo("<div class='imagediv' style='display:inline-block'><img src='images/".$imagesfordiv[$key]." ' alt='".$namesfordiv[$key]."' height='125' width='125'><br>".$namesfordiv[$key]."</div>");
            ?>
        <br>
        <!--I don't like the css style here, if the password is long and you shrink the window the password will go past the background, v2 problem-->
        <div id='finalpassword'><h2>Your Password is: <?php echo($password)?></h2></div>

        <div id='explanation'>
            <a href="https://xkcd.com/936/"><img src="images/password_strength.png" id="xkcd_image" alt="XKCD Password Strength Cartoon"></a>
            <h3>Welcome to my version of an XKCD password generator. What is an XKCD password? You could go to the source and read the comic at <a href='https://xkcd.com/936/'>xkcd: Password Strength</a>, but in words:</h3>
            <ul>
                <li>Passwords as we know them, with added numbers, special characters, and random caps have some flaws
                    <ul>
                        <li>They are hard to remember</li>
                        <li>Depending on length they can be relatively easy for a brute force approach to crack them</li>
                    </ul>
                </li>
                <li>So instead of using a word and adding or replacing some characters we will use a number of random words strung together.
                    <ul>
                        <li>This should be easier to remember</li>
                        <li>With the added character space it should be harder to brute force (assuming the attacker doesn't know we are using this method)</li>
                        <li>We can add in special characters to meet system requirements</li>
                    </ul>
                </li>
            </ul>
            <h3>This site will allow you to create your own XKCD password by entering the number of words you would like it to contain along with a number of options.
            And just to make a little different, your words are selected from the names of my sons toys with an added picture to help you remember.
            <br>Options include:</h3>
            <ul>
                <li>Number of words</li>
                <li>Adding a special character or number to satisfy site requirements</li>
                <li>Whether we should capitalize each word or use all caps or lowercase</li>
            </ul>
        </div>
    </div>
    <div id="footercontainer">
        <footer>
            &copy; <?php date('Y')  ?> Andrew Bielecki
        </footer>
    </div>
</body>
</html>
