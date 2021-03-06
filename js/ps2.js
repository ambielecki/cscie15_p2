/*js for CSCI E-15 P2
 *Code for hiding unused fields and
 *checking if requested number of words is bewtween 1-9
 */

window.addEventListener('load', numCheck);
window.addEventListener('load', formHide);

//function for checking if user input a correct value in number field
//also eliminates strings
function numCheck(){
    var numberWords = document.getElementById('numberofwords');
    var button = document.getElementById('getpassword');
    var hint = document.getElementById('numberhint');
    numberWords.addEventListener('blur', check);
    button.addEventListener('click', finalCheck);
    
    function check(){
        var numberValue = numberWords.value;
        if (!(numberValue>0 && numberValue<=9)){
            hint.style.display = 'inline-block';
        }else{
            hint.style.display = 'none'
        }
    }
    
    function finalCheck(evt){
        var numberValue = numberWords.value;
        if (!(numberValue>0 && numberValue<=9)) {
            evt.preventDefault();
        }
    }
}

//function for hiding divs that are not in use
function formHide(){
    var capsDiv = document.getElementById('capsdiv');
    var camelYes = document.getElementById('camelyes');
    var camelNo = document.getElementById('camelno');
    camelYes.onclick = function(){
        capsDiv.style.display='none';
    };
    camelNo.onclick = function(){
        capsDiv.style.display='block';
    };
    
    var charDiv = document.getElementById('chardiv');
    var charNo = document.getElementById('charno');
    var charYes = document.getElementById('charyes');
    charYes.onclick = function(){
        charDiv.style.display='block';
    };
    charNo.onclick = function(){
        charDiv.style.display='none';
    };
    
    var numDiv = document.getElementById('numdiv');
    var numNo = document.getElementById('numno');
    var numYes = document.getElementById('numyes');
    numYes.onclick = function(){
        numDiv.style.display='block';
    };
    numNo.onclick = function(){
        numDiv.style.display='none';
    };
    
    var sepDiv = document.getElementById('sepdiv');
    var sepNo = document.getElementById('sepno');
    var sepYes = document.getElementById('sepyes');
    sepYes.onclick = function(){
        sepDiv.style.display='block';
    };
    sepNo.onclick = function(){
        sepDiv.style.display='none';
    };
}


   