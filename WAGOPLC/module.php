<?php

/**
 *
 */
class WAGOPLC extends IPSModule {

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
   * MDS_AddHKV($id, $hkvid); 
   */
  public function AddHKV($hkvid) {
    echo "Neuer HKV wird angelegt...";
    $InsID = IPS_CreateInstance("{9469359F-EEA6-4DB0-930F-F08C3440DDB3}");
    IPS_SetName($InsID, "HKV ".$hkvid); // Instanz benennen
    $CatIdHKV = @IPS_GetCategoryIDByName("Heizkostenverteiler", $this->InstanceID);
    IPS_SetParent($InsID, $CatIdHKV);
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
   * 
   */
  public function ReceiveData($JSONString) {
    $data = json_decode($JSONString);
    IPS_LogMessage("Datensammler", utf8_decode($data->Buffer));
    //Parse and write values to our variables
    $this->parseMessage(utf8_decode($data->Buffer));
  }
 
  
  /**
   * 
   */
  private function parseMessage($hkvmessage) {
    // Validierung
    
    // Ermitteln der HKVID
    
    // Anlegen einer neuen HKV-Instanz, wenn noch nicht vorhanden
    
    // Zuweisen der Werte (Variablen) der HKV-Instanz
    
    // Wenn aktiviert: Forward der Nachricht an konfigurierbare 
    
  }

}

?>