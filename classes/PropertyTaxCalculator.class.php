<?php
class PropertyTaxCalculator {
public $assessmentValue;
public $taxCategoryRate;
public $taxSupportRate;

public $publicWorksPercentage = 0.197; 
public $policeServicesPercentage = 0.1878;
public $cochraneDSSABPercentage = 0.164;
public $generalGovernmentPercentage = 0.109;
public $firePercentage = 0.0823;
public $parksRecreationPercentage = 0.0541;
public $transitPercentage = 0.0458;
public $goldenManorPercentage = 0.036;
public $libraryBoardPercentage = 0.0267;
public $otherPercentage = 0.0248;
public $porcupineHealthPercentage = 0.0208;
public $tedcPercentage = 0.0204;
public $planningDevelopmentPercentage = 0.0112;
public $environmentalServicesPercentage = 0.0112;
public $mrcaPercentage = 0.0089;




public function __construct(int $assessmentValue, float $taxCategoryRate, float $taxSupportRate){

$this->assessmentValue = $assessmentValue;
$this->taxCategoryRate = $taxCategoryRate;
$this->taxSupportRate = $taxSupportRate;
}

public function formula(){
 global $taxArr;                               
$TaxAmount = ($this->assessmentValue * $this->taxCategoryRate) + ($this->assessmentValue * $this->taxSupportRate);
$TaxAmount_2Decimal = sprintf('%.2f', $TaxAmount);

$PublicWorks = $this->assessmentValue * $this->taxCategoryRate * $this->publicWorksPercentage; 
$PublicWorks_2Decimal = sprintf('%.2f', $PublicWorks);

$PoliceServices = $this->assessmentValue * $this->taxCategoryRate * $this->policeServicesPercentage; 
$PoliceServices_2Decimal = sprintf('%.2f', $PoliceServices);

$CochraneDSSAB = $this->assessmentValue * $this->taxCategoryRate * $this->cochraneDSSABPercentage; 
$CochraneDSSAB_2Decimal = sprintf('%.2f', $CochraneDSSAB);


$GeneralGovernment = $this->assessmentValue * $this->taxCategoryRate * $this->generalGovernmentPercentage; 
$gGov_2Decimal = sprintf('%.2f', $GeneralGovernment);

$Fire = $this->assessmentValue * $this->taxCategoryRate * $this->FirePercentage; 
$Fire_2Decimal = sprintf('%.2f', $Fire);

$ParksRecreation = $this->assessmentValue * $this->taxCategoryRate * $this->parksRecreationPercentage; 
$pRec_2Decimal = sprintf('%.2f', $ParksRecreation);

$Transit = $this->assessmentValue * $this->taxCategoryRate * $this->transitPercentage; 
$Transit_2Decimal = sprintf('%.2f', $Transit);

$GoldenManor = $this->assessmentValue * $this->taxCategoryRate * $this->goldenManorPercentage; 
$GoMa_2Decimal = sprintf('%.2f', $GoldenManor);

$LibraryBoard = $this->assessmentValue * $this->taxCategoryRate * $this->libraryBoardPercentage; 
$LibBoard_2Decimal = sprintf('%.2f', $LibraryBoard);

$Other = $this->assessmentValue * $this->taxCategoryRate * $this->Other; 
$Other_2Decimal = sprintf('%.2f', $Other);

$PorcupineHealth = $this->assessmentValue * $this->taxCategoryRate * $this->porcupineHealthPercentage; 
$pHealth_2Decimal = sprintf('%.2f', $PorcupineHealth);

$TEDC = $this->assessmentValue * $this->taxCategoryRate * $this->tedcPercentage; 
$TEDC_2Decimal = sprintf('%.2f', $TEDC);

$PlanningDevelopment = $this->assessmentValue * $this->taxCategoryRate * $this->planningDevelopmentPercentage; 
$pDevel_2Decimal = sprintf('%.2f', $PlanningDevelopment);

$EnvironmentalServices = $this->assessmentValue * $this->taxCategoryRate * $this->environmentalServicesPercentage; 
$Env_2Decimal = sprintf('%.2f', $EnvironmentalServices);

$MRCA = $this->assessmentValue * $this->taxCategoryRate * $this->mrcaPercentage; 
$MRCA_2Decimal = sprintf('%.2f', $MRCA);

$Education = $this->assessmentValue * $this->taxSupportRate; 
$Education_2Decimal = sprintf('%.2f', $Education);

$taxArr = array($TaxAmount_2Decimal, $PublicWorks_2Decimal, $PoliceServices_2Decimal, $CochraneDSSAB_2Decimal, $gGov_2Decimal, $Fire_2Decimal, $pRec_2Decimal, $Transit_2Decimal, $GoMa_2Decimal, $LibBoard_2Decimal,
                $Other_2Decimal, $pHealth_2Decimal, $TEDC_2Decimal, $pDevel_2Decimal, $Env_2Decimal, $MRCA_2Decimal, $Education_2Decimal); 
return $taxArr;
}

}
?>