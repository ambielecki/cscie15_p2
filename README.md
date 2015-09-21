# xkcd Password Generator

## Live URL
<http://p2.andrewbielecki.me>

## Description
A utility for generating [xkcd style passwords](http://xkcd.com/936/) with added pictures to help with memory.

## Demo
Coming soon

## Details for teaching team
No login required.

This is a work in progress, the image list is currently far to small to provide sercure passwords. But it was fun to do something a bit different.

Word list was generated from the file names contained in images.txt, a cleaned version of the image list for the site.

There is PHP validation of the number of words, however it is in addition to JS validation, you would need to disable JS to see it.

## Outside code
No outside code used. Bootstrap doesn't seem to play nice with radio buttons and JavaScript event handlers.

For ideas on keeping radio button choices preserved after form submit
* StackOverflow: http://stackoverflow.com/questions/19097320/keeping-radio-buttons-checked-after-form-submit

For info on opening and reading an outside file using PHP
* w3schools: http://www.w3schools.com/php/php_file_open.asp
