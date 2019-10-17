class inputException extends CustomException {
 public function errorMessage() {
$errorMsg = '<b>'.$this->getMessage().'</b> is not a digit';
 return $errorMsg;
  }
}