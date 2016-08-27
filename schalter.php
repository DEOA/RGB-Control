<?php
    $l=$_GET['l'];
    $r=$_GET['r'];
    $g=$_GET['g'];
    $b=$_GET['b'];

    
    if($l !="" AND $r != "" AND $g != "" AND $b != "")
    {
     
        if ($l = "1") {
        
        $execute = shell_exec("pigs p 27 $r");
        $execute = shell_exec("pigs p 17 $g");
        $execute = shell_exec("pigs p 22 $b");
        } else if ($l = "2") {
            
            $execute = shell_exec("pigs p 19 $r");
            $execute = shell_exec("pigs p 13 $g");
            $execute = shell_exec("pigs p 26 $b");
            
            
        } else {
        
            // Room for more RGB Stripes
            
        }
        
    }
    
?>

