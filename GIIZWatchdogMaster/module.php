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

    $baseCategoryId = $this->CheckBaseCategory();
    $this->RegisterPropertyBoolean("Active", true);
    $this->RegisterPropertyInteger("PropertyCategoryID", $baseCategoryId);
    $this->RegisterPropertyBoolean("Email", false);
    $this->RegisterPropertyInteger("EmailInstanceID", 0);
    $this->RegisterPropertyBoolean("MQTT", false);
    $this->RegisterPropertyInteger("MQTTPublisherInstanceID", 0);

    // Check, if WD base category is available
  }

  /**
   * 
   */
  public function ApplyChanges() {
    parent::ApplyChanges();
    echo "Neue Email-InstanzID: " . $this->ReadPropertyInteger("EmailInstanceID");
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
    $this->SendDebug("RECEIVED", "HELLO", 0);
    // Identify
    $identifier = "";
    // Refresh  Variable for remote instance
    $baseCategoryID = @IPS_GetCategoryIDByName("WATCHDOG", 0);
    $VarID = @IPS_GetVariableIDByName($identifier, $baseCategoryID);
    if ($VarID === false) {
      echo "Variable for remote instance not found, will be created...";
      echo "Create link to watchdog";
    } else {
      echo "The Variable ID is: " . $VarID;
    }
    // refresh variable
  }

  /*
   * GWDM_Transmit($id, $data);
   *
   */

  public function Transmit($data) {
    echo "Received: " . $data . PHP_EOL;
  }

  /**
   * 
   * @return type
   */
  private function CheckBaseCategory() {
    $baseCategoryID = @IPS_GetCategoryIDByName("WATCHDOG", 0);
    if ($baseCategoryID === false) {
      echo "Category not found, will be created...";
      $baseCategoryID = IPS_CreateCategory();
      IPS_SetName($baseCategoryID, "WATCHDOG");
    } else {
      echo "The Category ID is: " . $baseCategoryID;
    }
    return $baseCategoryID;
  }

  /**
   * 
   * @param type $id
   * @param type $ident
   * @param type $name
   * @return type
   */
  private function CreateCategoryByIdent($id, $ident, $name) {
    $cid = @IPS_GetObjectIDByIdent($ident, $id);
    if ($cid === false) {
      $cid = IPS_CreateCategory();
      IPS_SetParent($cid, $id);
      IPS_SetName($cid, $name);
      IPS_SetIdent($cid, $ident);
    }
    return $cid;
  }

}

?>
