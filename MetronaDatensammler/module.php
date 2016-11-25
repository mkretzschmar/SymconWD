<?php

define("BASE_CATEGORY_NAME", "Heizkostenverteiler");

/**
 * Splitter-Modul eines Metrona Datensammlers. Nachrichten werden geparst und
 * an die HKV-Instanzen weitergeleitet.
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

    $this->RegisterPropertyString("Name", "DS");
    $this->RegisterPropertyBoolean("Active", false);
    $this->RegisterPropertyString("HKVID", "00000000");
    //print_r($this);
  }

  /**
   *
   */
  public function ApplyChanges() {
    parent::ApplyChanges();
    //Always create our own VirtualIO, when no parent is already available
    $this->RequireParent("{6179ED6A-FC31-413C-BB8E-1204150CF376}"); // Virtual IO
    $this->SendDebug("CHANGED", "Verbunden mit VirtualIO", 0);
  }

  /**
   *
   * MDS_RequestState($id);
   *
   */
  public function RequestState() {
    echo "Requesting MDS State...";
  }

  /**
   * MDS_AutoConfig($id); 
   */
  public function AutoConfig() {
    $parentId = 0; // $this->InstanceID
    // 1. Category 'Heizkostenverteiler',
    //  each HKV will be represented by an Object of type "device"
    //$CatIdHKV = @IPS_GetCategoryIDByName("Heizkostenverteiler", $this->InstanceID);
    $CatIdHKV = @IPS_GetCategoryIDByName(BASE_CATEGORY_NAME, $parentId);
    if ($CatIdHKV === false) {
      echo "Kategorie '" . BASE_CATEGORY_NAME . "' nicht gefunden, wird angelegt...";
      $CatIdHKV = IPS_CreateCategory();
      IPS_SetName($CatIdHKV, BASE_CATEGORY_NAME);
      IPS_SetParent($CatIdHKV, $parentId);
    } else {
      echo "Kategorie '" . BASE_CATEGORY_NAME . "' bereits vorhanden: " . $CatIdHKV;
    }
  }

  /**
   * MDS_AddHKV($id); 
   */
  public function AddHKV() {
    $Name = "HKV " . $this->ReadPropertyString("HKVID");
    $CatIdHKV = @IPS_GetCategoryIDByName(BASE_CATEGORY_NAME, $parentId);
    $InstanzID = @IPS_GetInstanceIDByName($Name, $CatIdHKV);
    if ($InstanzID === false) {
      echo "HKV wird angelegt...";
      $InsID = IPS_CreateInstance("{9469359F-EEA6-4DB0-930F-F08C3440DDB3}");
      IPS_SetName($InsID, $Name);
      IPS_SetParent($InsID, $CatIdHKV);
    } else {
      echo "HKV bereits vorhanden!";
    }
  }

  public function ForwardData($JSONString) {
    $data = json_decode($JSONString);
    IPS_LogMessage("Datensammler FRWD", utf8_decode($data->Buffer));
    $this->SendDebug("FORWARD", $data, 0);
    //We would package our payload here before sending it further...
    $this->SendDataToParent(json_encode(Array("DataID" => "{79827379-F36E-4ADA-8A95-5F8D1DC92FA9}", "Buffer" => $data->Buffer)));

    //Normally we would wait here for ReceiveData getting called asynchronically and buffer some data
    //Then we should extract the relevant feedback/data and return it to the caller
    return "String data for the device instance!";
  }

  /**
   * 
   */
  public function ReceiveData($JSONString) {
    $data = json_decode($JSONString);
    IPS_LogMessage("Datensammler RECV", utf8_decode($data->Buffer));
    $this->SendDebug("RECEIVED", $data, 0);
    //Parse and write values to our variables

    //$msgArray = $this->parseMessage(utf8_decode($data->Buffer));

    // CUTTER anlegen
    //$idCutter = IPS_CreateInstance("{AC6C6E74-C797-40B3-BA82-F135D941D1A2}");
    //IPS_SetName($idCutter, "Cutter DS"); // Instanz benennen
    //IPS_SetParent($idCutter, $this->InstanceID);
    // Prüfen, ob HKV existiert, falls nicht, anlegen und verlinken
    // Daten an alle HKV weiterleiten (TODO: Filter nach HKVID, forward nur an TargetHKV)
    $this->SendDataToChildren(json_encode(Array("DataID" => "{2D35A92B-F179-44A3-91F6-34A5CE061D1D}", "Buffer" => $data->Buffer)));
  }

  /**
   * 
   */
  private function parseMessage($hkvmessage) {
    IPS_LogMessage("Datensammler", "parseMessage()");
    // Validierung
    // Ermitteln der HKVID
    // Anlegen einer neuen HKV-Instanz, wenn noch nicht vorhanden
    // Zuweisen der Werte (Variablen) der HKV-Instanz
    // Wenn aktiviert: Forward der Nachricht an konfigurierbare 
    return array("1" => "A", "2" => "B");
  }

}

?>
