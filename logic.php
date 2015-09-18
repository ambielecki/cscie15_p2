<?php
    //set defaults to avoid errors
    if(!$_POST){
        $form = array(
        'howmany'=>'3',
        'special'=>'no',
        'charpos'=>'left',
        'number'=>'no',
        'numberpos'=>'left',
        'camel'=>'no',
        'caps'=>'lower',
        'separator'=>'yes',
        'sepval'=>'_');
    }else{
        $form = array();
    }
    
    foreach($_POST as $key => $value){
        $form[$key]=$value;
    }
    /*array structure
     *$form['howmany']=>'5'
     *$form['special']=>'yes/no'
     *['charpos'] = 'left/right'
     *$form['number']='yes/no'
     *['numpos']='left/right'
     *form['camel']='yes/no'
     *form['caps']='caps/lower'
     ]
     **/
    
    $placeholder = '';
    if ($form['howmany']){
        $placeholder = $form['howmany'];
    }
    
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
    
    $speciallist = array('!','#','%','&','+','<','>','~'); //an array of some special characters
    $password = '';//set a blank password
    
    $imagesfordiv = array();
    $namesfordiv = array();
    
    //set up blank array for the image display and the words below them
    for ($j=0; $j<=8; $j++){
        $imagesfordiv[$j] = 'blank.jpg';
        $namesfordiv[$j] = '';
    }
    
    //build our arrays of image names and words for the password
    for ($i=0; $i<$form['howmany']; $i++){
        $thisword = '';
        $random = rand(0,(count($nameslist)-1));
        $imagesfordiv[$i] = $imagelist[$random];
        $namesfordiv[$i] = $nameslist[$random];
        
        //take care of capitalization
        if ($form['camel'] == 'yes'){
            $thisword = ucfirst($nameslist[$random]);
        }elseif ($form['caps'] == 'caps'){
            $thisword = strtoupper($nameslist[$random]);
        }else{
            $thisword = $nameslist[$random];
        }
        
        //add separator if needed
        if ($form['separator'] == 'yes' && $password != ''){
            $password = $password . $form['sepval'] . $thisword;
        }else{
            $password = $password . $thisword;
        }
    }
    
    //add special char if requested
    if ($form['special'] == 'yes'){
        $thisspecial = $speciallist[rand(0, (count($speciallist)-1))];
        if ($form['charpos'] == 'left'){
            $password = $thisspecial . $password;
        }else{
            $password = $password . $thisspecial;
        }
    }
    
    //add random number if requested
    if ($form['number'] == 'yes'){
        $thisnumber = rand(0,9);
        if ($form['numpos'] == 'left'){
            $password = $thisnumber . $password;
        }else{
            $password = $password . $thisnumber;
        }
    }

?>