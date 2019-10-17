<?php
function inputCheck()
{
ob_start();    
try{
    if ( (isset($AssessmentValue)) & (!ctype_digit($AssessmentValue)) ) {
        throw new inputException($AssessmentValue);
    }
    
    
    if (isset($_POST['answer']) and empty($_POST['TaxCategory'])) {
        throw new Exception("Please select a Category from the checkboxes!");
    }

} 

catch (inputException $e) {
ob_end_clean();
    echo "<h3>Caught Exception!</h3>";
    echo "<p>Error: " . $e->errorMessage() . "</p>";    
    echo "<p>Webmaster has been notified</p>";
exit(1);
}

catch(Exception $e) {
ob_end_clean();
    echo "<h3>Caught Exception!</h3>";
    echo "<p>Error: " . $e->getMessage() . "</p>";    
    echo "<p>Webmaster has been notified</p>";
exit(1);
}

}
?>
