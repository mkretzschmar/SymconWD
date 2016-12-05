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

    $baseCategoryId = 0; //$this->CheckBaseCategory();
    $this->RegisterPropertyBoolean("Active", true);
    //$this->RegisterPropertyInteger("PropertyCategoryID", $baseCategoryId);
    $this->RegisterPropertyInteger("BaseCategory", 0);
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
    //echo "Neue Email-InstanzID: " . $this->ReadPropertyInteger("EmailInstanceID");
  }

  /*
   * GWDM_CreateWatchdogReport($id);
   *
   */

  public function CreateWatchdogReport() {
    
  }

  /*
   * GWDM_Hello($id, $msg);
   */

  public function Hello($msg) {
    $this->SendDebug("RECEIVED", $msg, 0);
    // Identify
    $identifier = "";
    // Refresh  Variable for remote instance
    $baseCategoryID = @IPS_GetCategoryIDByName("WATCHDOG", 0);
    $VarID = @IPS_GetVariableIDByName($identifier, $baseCategoryID);
    if ($VarID === false) {
      //echo "Variable for remote instance not found, will be created...";

      $VarID_SlaveInstanz = IPS_CreateVariable(1);
      IPS_SetName($VarID_SlaveInstanz, $msg); // Variable benennen
      IPS_SetParent($VarID_SlaveInstanz, $this->InstanceID);
      //echo "Create link to watchdog";
    } else {
      //echo "The Variable ID is: " . $VarID;
    }
    // refresh variable
    IPS_SetValue($VarID_SlaveInstanz, time());
    ECHO "SUCCESS.";
  }

  /**
   * 
   * @return type
   */
  private function CheckBaseCategory() {
    $baseCategoryID = @IPS_GetCategoryIDByName("WATCHDOG", 0);
    if ($baseCategoryID === false) {
      //echo "Category not found, will be created...";
      $baseCategoryID = IPS_CreateCategory();
      IPS_SetName($baseCategoryID, "WATCHDOG");
    } else {
      //echo "The Category ID is: " . $baseCategoryID;
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
