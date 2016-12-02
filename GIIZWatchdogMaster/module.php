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
  }

  /**
   * 
   */
  public function ApplyChanges() {
    parent::ApplyChanges();
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
