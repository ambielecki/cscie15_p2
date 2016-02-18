<?php
    $warning = '';//warning for later php validation
    
    //initiate an array to hold a list of images available
    $imagelist = array();
    
    //found the file open documentation on w3schools http://www.w3schools.com/php/php_file_open.asp
    $imagefile = fopen('files/imagelist.txt','r');//opens the file
    while(!feof($imagefile)){//iterates line by line until the end of the doc is reached
        $line = fgets($imagefile);//reads the line and assigns text to $line
        $line = rtrim($line);//trim whitespace off the end
        $imagelist[] = $line;//push to our imagelist array
    }
    fclose($imagefile);//close our imagefile
    
    //create the array that will contain our word list
    $nameslist = array();
    
    //get words from the imagelist without the .jpg
    foreach($imagelist as $key => $value){
        $name = str_replace('.jpg','',$value);
        $nameslist[$key]=$name;
    }

    $imagesfordiv = [];
    
    $password = '';//initiate the password
    $placeholder = '';

    //note to self using the char < messed everthing up
    $speciallist = array('!','#','%','&','+','>','~'); //an array of some special characters
    
    //if is for php validation, you should never see this unless JS is disabled
    if(($_POST) && (is_numeric($_POST['howmany'])) && ($_POST['howmany']>0) && ($_POST['howmany']<10)){
            
        //populate the $form array
        foreach($_POST as $key => $value){
            $form[$key]=$value;
        }
        
        //sets a placeholder for the number of words in the HTML field
        
        if($form['howmany']){
            $placeholder = $form['howmany'];
        }

        //arrays for the images and names we'll use to build the password
        $imagesfordiv = array();
        $namesfordiv = array();
        
        //build our arrays of image names and words for the password
        for ($i=0; $i<$form['howmany']; $i++){
            $thisword = '';
            $random = rand(0,(count($nameslist)-1));
            $imagesfordiv[$i] = $imagelist[$random];
            $namesfordiv[$i] = $nameslist[$random];
            
            //take care of capitalization
            if($form['camel'] == 'yes'){
                $thisword = ucfirst($nameslist[$random]);//capitalize first letter
            }elseif($form['caps'] == 'caps'){
                $thisword = strtoupper($nameslist[$random]);//make all uppercase
            }else{
                $thisword = $nameslist[$random];
            }
            
            //add separator if requested
            if($form['separator'] == 'yes' && $password != ''){//adds to the beginning of every word after the first
                $password = $password . $form['sepval'] . $thisword;
            }else{
                $password = $password . $thisword;
            }
        }
        
        //add special char if requested
        if($form['special'] == 'yes'){
            $thisspecial = $speciallist[rand(0, (count($speciallist)-1))];
            if($form['charpos'] == 'left'){
                $password = $thisspecial . $password;
            }else{
                $password = $password . $thisspecial;
            }
        }
        
        //add random number if requested
        if($form['number'] == 'yes'){
            $thisnumber = rand(0,9);
            if($form['numpos'] == 'left'){
                $password = $thisnumber . $password;
            }else{
                $password = $password . $thisnumber;
            }
        }
        
    }else{//PHP validation, only shows if JS is disabled get here if we failed the howmany field being between 1 and 9
        if($_POST){
            $form = $_POST;
            $placeholder = $_POST['howmany'];
            $warning = 'Only values between 1 and 9 are accepted (PHP)';
        }else{
            $form = array(
            'howmany'=>'3',
            'special'=>'yes',
            'charpos'=>'left',
            'number'=>'yes',
            'numpos'=>'left',
            'camel'=>'no',
            'caps'=>'lower',
            'separator'=>'yes',
            'sepval'=>'_');
            $placeholder = '3';
            $warning = '';
        }
    }
?>