<?php
declare(strict_types = 1);
include 'includes/autoloader.inc.php';
include 'lib/functions.php';

// Collectable Property tax percentage - Manual input

$Residential_Property_Tax = 0.01706102;
$Commercial_Property_Tax = 0.03449459;
$Industrial_Property_Tax = 0.04265256;

// Property tax percentage in support of services - Manual input

$Residential_EducationSupport = 0.00161;
$Commercial_EducationSupport = 0.0103;
$Industrial_EducationSupport = 0.0103;

// Property value for tax assessment - user submitted input
$AssessmentValue = $_POST['AssessmentValue'];
$TaxCategory = $_POST['TaxCategory'];
// $TaxCategoryRate will reference all peroperty categories via an if/else

// check data type - no sanitization required
if(isset($_POST['answer']) ){
echo '<pre>' . inputCheck() . '</pre>';
}


if ($TaxCategory === 'Residential'){
$TaxCategoryRate = $Residential_Property_Tax;
$TaxSupportRate = $Residential_EducationSupport;
} 
elseif ($TaxCategory === 'Commercial'){
$TaxCategoryRate = $Commercial_Property_Tax;
$TaxSupportRate = $Commercial_EducationSupport;
} 
else {
$TaxCategoryRate = $Industrial_Property_Tax;
$TaxSupportRate = $Industrial_EducationSupport;
}


// Object instantiation
$PropertyTaxCalculator1 = new PropertyTaxCalculator(
(int)$AssessmentValue, (float)$TaxCategoryRate, (float)$TaxSupportRate);

try {
$PropertyTaxCalculator1->formula()[0];
}
catch (TypeError $error){ 
echo "Error!: " .$error->getMessage();
}

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>


<form method="post" attribute="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>Assessed Value ($):<br/>
<input type="text" id="AssessmentValue" name="AssessmentValue" value="<?php echo $_POST['AssessmentValue'];?>"></p>

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
echo " <span style='font-family: verdana; font-size: 10pt; font-weight: bolder; color: blue'> $$taxArr[0] </span>";
?>
</p>


<p>Here's how your taxes are allocated:</p>

<table style="width:100%">
  

  <tr>
    <th width="60%">Departments</th>
    <th width="40%">Amount Allocated</th>		
  </tr>


  <tr style="background-color: #f1f1c1;">
    <td>Public Works, Roads, Engineering </td>
    <td> $<?php echo $taxArr[1] ;?> </td>		
     </tr>

 <tr>
    <td>General Government</td>
    <td>$<?php echo $taxArr[4];?></td>		
  </tr>

 <tr style="background-color: #f1f1c1;">
    <td>Fire</td>
    <td>$<?php echo $taxArr[6] ;?></td>		
  </tr>


  <tr>
    <td>Parks and Recreation  </td>
    <td>$<?php echo $taxArr[7];?></td>		
  </tr>

<tr style="background-color: #f1f1c1;">
    <td>Transit </td>
    <td> $<?php echo $taxArr[8];?> </td>		
  </tr>

<tr>
    <td>Golden Manor </td>
    <td> $<?php echo $taxArr[9];?> </td>		
  </tr>


<tr style="background-color: #f1f1c1;">
    <td>Other   </td>
    <td> $<?php echo $taxArr[10];?> </td>		
  </tr>

<tr>
    <td>Planning and Development</td>
    <td> $<?php echo $taxArr[13];?> </td>		
  </tr>1

<tr style="background-color: #f1f1c1;">
    <td>Environmental Services</td>
    <td> $<?php echo $taxArr[14];?> </td>		
  </tr>


</table>


<table style="width:100%">
  

  <tr>
    <th width="60%">Boards</th>
    <th width="40%">Amount Allocated</th>		
  </tr>

  <tr style="background-color: #eee;">
    <td>Police Services Board </td>
    <td>$<?php echo $taxArr[2];?></td>		
  </tr>


  <tr>
    <td>Cochrane DSSAB </td>
    <td>$<?php echo $taxArr[3];?></td>		
  </tr>

 
<tr style="background-color: #eee;">
    <td>Library Board  </td>
    <td> $<?php echo $taxArr[9];?> </td>		
  </tr>


<tr>
    <td>Porcupine Health Unit</td>
    <td> $<?php echo $taxArr[11];?> </td>		
  </tr>

<tr style="background-color: #eee;">
    <td>Timmins Economic Development Board    </td>
    <td> $<?php echo $taxArr[12];?> </td>		
  </tr>

<tr>
    <td>MRCA   </td>
    <td> $<?php echo $taxArr[15];?> </td>		
  </tr>


</table>





<table style="margin-left: 0%; width:100%">
  
  <tr>
    <th width="60%">Education</th>
    <th width="40%">Amount Allocated</th>		
  </tr>

<tr style="background-color: #99cccc;">
    <td>Education   </td>
    <td> $<?php echo $taxArr[16];?> </td>		
  </tr>


  </table>
  </body>
  </html>
