<?php
//  Check user availability
function userAvailabilityCheck(string $usr, string $psw){
    if($usr == "Starme" && $psw == "test"){
        return true;
    }else{
        return false;
    }
}
?>