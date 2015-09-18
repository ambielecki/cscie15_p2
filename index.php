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
    <div class='header'>
        <h1>
            <p>CSCI-E15 P2<br>
             An XKCD Style Password Generator<br>
             As Seen Through the Eyes of a 4 Year Old</p>
        </h1>
    </div>
    <div id='maincontainer'>
        <!--Got ideas for preserving user data in this StackOverflow http://stackoverflow.com/questions/19097320/keeping-radio-buttons-checked-after-form-submit-->
        <form method='post' action='index.php' id='optionsform'>
            <div class='formtext'>How Many Words Would You Like? (min = 1 max = 9)?:</div><input id='numberofwords' type='text' name='howmany' value='<?php echo($placeholder);?>'><br>
            <div id='numberhint' class='hint'>Only values between 1 and 9 are accepted.</div>
            <br>
            
            <div class='formtext'>Would you like to include a separator between words?:</div>
            <input type='radio' name='separator' value='yes' id='sepyes' <?php if($form['separator']!='no'){echo('checked');};?>><div class='radio1text'>Yes</div>
            <input type='radio' name='separator' value='no' id='sepno' <?php if($form['separator']=='no'){echo('checked');};?>> No<br>
            
            <div id='sepdiv' <?php if($form['separator']=='no'){echo('style="display:none"');};?>>
                <div class='formtext'>Use _ or - ?:</div>
                <input type='radio' name='sepval' value='_' <?php if($form['sepval']!='-'){echo('checked');};?>><div class='radio1text'>_</div>
                <input type='radio' name='sepval' value='-' <?php if($form['sepval']=='-'){echo('checked');};?>> -<br>
            </div>
            
            <div class='formtext'>Would you like to include a special character (ex: !%#)?:</div>
            <input type='radio' name='special' value='yes' id='charyes'<?php if($form['special']!='no'){echo('checked');};?>><div class='radio1text'>Yes</div>
            <input type='radio' name='special' value='no' id='charno' <?php if($form['special']=='no'){echo('checked');};?>> No<br>
            
            <div id='chardiv' <?php if($form['special']=='no'){echo('style="display:none"');};?>>
                <div class='formtext'>On the left or right?:</div>
                <input type='radio' name='charpos' value='left' <?php if($form['charpos']!='right'){echo('checked');};?>><div class='radio1text'>Left</div>
                <input type='radio' name='charpos' value='right'<?php if($form['charpos']=='right'){echo('checked');};?>> Right<br>
            </div>
            
            <div class='formtext'>Would you like to include a number?:</div>
            <input type='radio' name='number' value='yes' id='numyes'<?php if($form['number']!='no'){echo('checked');};?>><div class='radio1text'>Yes</div>
            <input type='radio' name='number' value='no' id='numno' <?php if($form['number']=='no'){echo('checked');};?>> No<br>
            
            <div id='numdiv' <?php if($form['number']=='no'){echo('style="display:none"');};?>>
                <div class='formtext'>On the left or right?:</div>
                <input type='radio' name='numpos' value='left' <?php if($form['numpos']!='right'){echo('checked');};?>><div class='radio1text'>Left</div>
                <input type='radio' name='numpos' value='right'<?php if($form['numpos']=='right'){echo('checked');};?>> Right<br>
            </div>
            
            <div class='formtext'>Would you like to capitalize each word?:</div>
            <input type='radio' name='camel' value='yes' id='camelyes'<?php if($form['camel']!='no'){echo('checked');};?>><div class='radio1text'>Yes</div>
            <input type='radio' name='camel' value='no' id='camelno' <?php if($form['camel']=='no'){echo('checked');};?>> No<br>
            
            <div id='capsdiv'<?php if($form['camel']=='yes'){echo('style="display:none"');};?>>
                <div class='formtext'>  Would you like all caps or lowercase?:</div>
                <input type='radio' name='caps' value='caps'<?php if($form['caps']!='lower'){echo('checked');};?>><div class='radio1text'>Caps</div>
                <input type='radio' name='caps' value='lower' <?php if($form['caps']=='lower'){echo('checked');};?>> Lower<br>
            </div>
            <div class='formtext'></div><input id='getpassword' type='submit' value='Get Password'>
        </form><br>
        
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[0]);?>' alt='<?php echo($namesfordiv[0]);?>' height='100' width='100'><br><?php echo($namesfordiv[0]);?></div>
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[1]);?>' alt='<?php echo($namesfordiv[1]);?>' height='100' width='100'><br><?php echo($namesfordiv[1]);?></div>
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[2]);?>' alt='<?php echo($namesfordiv[2]);?>' height='100' width='100'><br><?php echo($namesfordiv[2]);?></div>
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[3]);?>' alt='<?php echo($namesfordiv[3]);?>' height='100' width='100'><br><?php echo($namesfordiv[3]);?></div>
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[4]);?>' alt='<?php echo($namesfordiv[4]);?>' height='100' width='100'><br><?php echo($namesfordiv[4]);?></div>
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[5]);?>' alt='<?php echo($namesfordiv[5]);?>' height='100' width='100'><br><?php echo($namesfordiv[5]);?></div>
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[6]);?>' alt='<?php echo($namesfordiv[6]);?>' height='100' width='100'><br><?php echo($namesfordiv[6]);?></div>
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[7]);?>' alt='<?php echo($namesfordiv[7]);?>' height='100' width='100'><br><?php echo($namesfordiv[7]);?></div>
        <div class='imagediv' style='display:inline-block'><img src='images/<?php echo($imagesfordiv[8]);?>' alt='<?php echo($namesfordiv[8]);?>' height='100' width='100'><br><?php echo($namesfordiv[8]);?></div>
        <br>
        <div id='finalpassword'><h2>Your Password is: <?php echo($password)?></h2></div>
        
        <div id='explanation'>
            <h3>Welcome to my version of an XKCD password generator. What is an XKCD password? You could go to the source and read the comic at <a href='https://xkcd.com/936/'>xkcd: Password Strength</a>, but in words:</h3>
            
            <ul>
                <li>Passwords as we know them, with added numbers, special characters, and random caps have some flaws</li>
                <ul>
                    <li>They are hard to remember</li>
                    <li>Depending on length they can be relatively easy for a brute force approach to crack them</li>
                </ul>
                <li>So instead of using a word and adding or replacing some characters we will use a number of random words strung together.</li>
                <ul>
                    <li>This should be easier to remember</li>
                    <li>With the added character space it should be harder to brute force (assuming the attacker doesn't know we are using this method)</li>
                    <li>We can add in special characters to meet system requirements</li>
                </ul>
            </ul>
            <h3>For my version we're adding some visual flair (and some help remembering) with pictures of the toys lying around the house.
            Our word list will be taken from the names of the toys (scraped from a directory listing of the image files).
            <br>Options include:</h3>
            <ul>
                <li>Number of words</li>
                <li>Adding a special character or number to satisfy site requirements</li>
                <li>Whether we should capitalize each word or use all caps or lowercase</li>
            </ul>
        </div>
    </div>


</body>
</html>
