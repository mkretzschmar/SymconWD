<?php

// Implementierung der Watchdog Zentralinstanz
class GIIZWatchdogMaster extends IPSModule {

  /**
   * 
   * @param type $InstanceID
   */
  public function __construct($InstanceID) {
    parent::__construct($InstanceID);
  }

  /**
   * 
   */
  public function Create() {
    parent::Create();
    $this->RegisterPropertyBoolean("Active", true);
    $this->RegisterPropertyInteger("EmailInstanceID", 0);
  }

  /**
   * 
   */
  public function ApplyChanges() {
    parent::ApplyChanges();
    echo "Neue Email-InstanzID: ".$this->ReadPropertyInteger("EmailInstanceID");
  }

  /*
   * GWDM_CreateWatchdogReport($id);
   *
   */

  public function CreateWatchdogReport() {
    
  }

  /*
   * GWDM_Hello($id);
   */
  public function Hello() {
    echo "Hello received" . PHP_EOL;
  }

  /*
   * GWDM_Transmit($id, $data);
   *
   */
  public function Transmit($data) {
    echo "Received: " . $data . PHP_EOL;
  }

}

?>
