<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>


<form method="post" attribute="post" action="includes/PropertyTaxCalculator.inc.php">
<p>Assessed Value ($):<br/>
<input type="text" id="AssessmentValue" name="AssessmentValue" value="<?php echo stripslashes($_POST['AssessmentValue']);?>"></p>

<input type="radio" name="TaxCategory" id="TaxCategory" value="Residential" 
<?php
if(isset($_POST['answer']) && ($_POST['TaxCategory']=='Residential')  ){ 
echo $checked;
}
?>
<span>Residential Property</span><br/>



<input type="radio" name="TaxCategory" id="TaxCategory" value="Commercial" 
<?php
if(isset($_POST['answer']) && ($_POST['TaxCategory']=='Commercial')  ){ 
echo $checked;
}
?>
<span>Commercial Occupied Property</span><br/>


<input type="radio" name="TaxCategory" id="TaxCategory" value="Industrial" 
<?php
if(isset($_POST['answer']) && ($_POST['TaxCategory']=='Industrial')  ){ 
echo $checked;
}
?>
<span>Industrial Occupied Property</span><br/>

<p></p>
<button type="submit" name="answer" id="answer" value="answer">Calculate</button>
</form>

<p> Based on your assessment of <span style="font-family: verdana; font-size: 10pt;color: blue">$<?php echo $AssessmentValue;?></span>, your total calculated property tax is: 
<?php 
echo " <span style='font-family: verdana; font-size: 10pt; font-weight: bolder; color: blue' >$$TaxAmount_2Decimal </span>";
?>
</p>


  </table>
 </body>
</html>