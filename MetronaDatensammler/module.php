<?php

/**
 *
 */
class MetronaDatensammler extends IPSModule {

  /**
   *
   */
  public function __construct($InstanceID) {
    parent::__construct($InstanceID);
  }

  /**
   *
   */
  public function Create() {
    parent::Create();
  }

  /**
   *
   */
  public function ApplyChanges() {
    parent::ApplyChanges();
    //Connect to available splitter or create a new one
    $this->ConnectParent("{46C969BF-3465-4E3E-B2A5-E404FB969735}");
  }

  /**
   *
   * CC7_RequestState($id);
   *
   */
  public function RequestState() {
    echo "Requesting CC7 State...";
  }

  /**
   * MDS_AutoConfig($id); 
   */
  public function AutoConfig() {
    // 1. Cateory 'Heizkostenverteiler',
    //  each HKV will be represented by an Object of type "device"
    $CatIdHKV = @IPS_GetCategoryIDByName("Heizkostenverteiler", $this->InstanceID);
    if ($CatIdHKV === false) {
      echo "Kategorie 'Heizkostenverteiler' nicht gefunden, wird angelegt...";
      $CatIdHKV = IPS_CreateCategory();
      IPS_SetName($CatIdHKV, "Heizkostenverteiler");
      IPS_SetParent($CatIdHKV, $this->InstanceID);
    } else {
      echo "Kategorie 'Heizkostenverteiler' bereits vorhanden: " . $CatIdHKV;
    }
  }

  /**
   * MDS_AddHKV($id); 
   */
  public function AddHKV() {
    echo "Neuer HKV wird angelegt...";
    //$InsID = IPS_CreateInstance("{6FE43522-7204-4686-A63F-653B4D93D6D6}");
    //IPS_SetName($InsID, "HKV " + $hkvid); // Instanz benennen
    //$CatIdHKV = @IPS_GetCategoryIDByName("Heizkostenverteiler", $this->InstanceID);
    //IPS_SetParent($InsID, $CatIdHKV);
  }

  /**
   * This function will be available automatically after the module is imported with the module control.
   * Using the custom prefix this function will be callable from PHP and JSON-RPC through:
   *
   * MDS_Send($id, $text);
   *
   */
  public function Send($Text) {
    $this->SendDataToParent(json_encode(Array("DataID" => "{B87AC955-F258-468B-92FE-F4E0866A9E18}", "Buffer" => $Text)));
  }

  /**
   */
  public function ReceiveData($JSONString) {
    $data = json_decode($JSONString);
    IPS_LogMessage("Datensammler", utf8_decode($data->Buffer));
    //Parse and write values to our variables
    echo "received: " . $JSONString;
  }

}

?>
