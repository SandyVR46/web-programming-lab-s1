<?php  
$students = array("Joey Tribbiani", "Rachel Green", "Monica Gellerr", "Chandler Bing", "Phoebe Buffay", "Ross Geller", "Janice Hosenstein");
echo "<b>Normal Array : </b>"; 
print_r($students); 
echo "<br><br> <b>Ascending Sort : </b><br>"; 
asort($students); 
print_r($students); 
echo "<br><br> <b>Descending Sort : </b><br>"; 
arsort($students); 
print_r($students); 
?> 