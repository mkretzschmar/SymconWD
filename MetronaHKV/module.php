<?php

/**
 * 
 */
class MetronaHKV extends IPSModule {

  /**
   * 
   */
  public function Create() {
    parent::Create();

    //$this->RegisterPropertyString("ReceiveFilter", "1B99*");
    $this->RegisterPropertyString("Name", "HKV Test");
  }

  /**
   * 
   */
  public function ApplyChanges() {
    parent::ApplyChanges();

    //Connect to available splitter (Datensammler) or create a new one
    //$this->ConnectParent("{6179ED6A-FC31-413C-BB8E-1204150CF376}");

    $this->ConnectParent("{3D704922-660A-43D1-9145-539552DD4EC6}"); // GUID Metrona Datensammler

    $this->SendDebug("CHANGED", "Verbunden mit Datensammler", 0);
    //Apply filter
    //$this->SetReceiveDataFilter($this->ReadPropertyString("ReceiveFilter"));
  }

  /**
   * This function will be available automatically after the module is imported with the module control.
   * Using the custom prefix this function will be callable from PHP and JSON-RPC through:
   *
   * HKV_Send($id, $text);
   *
   */
  public function Send($Text) {
    $this->SendDataToParent(json_encode(Array("DataID" => "{B87AC955-F258-468B-92FE-F4E0866A9E18}", "Buffer" => $Text)));
    $this->SendDebug("SEND", $Text, 0);
  }

  /**
   * HKV_ReceiveData($id, $JSONString); 
   */
  public function ReceiveData($JSONString) {
    $data = json_decode($JSONString);
    //Parse and write values to our buffer
    $this->SetBuffer("hkvmessage", utf8_decode($data->Buffer));
    //Print buffer
    IPS_LogMessage("MetronaHKV", $this->GetBuffer("hkvmessage"));
    $this->SendDebug("RECEIVED", $data, 0);

    // Parse data, refresh state variables
  }

  /**
   * 
   */
  // public function MessageSink($TimeStamp, $SenderID, $Message, $Data) {
//
//   IPS_LogMessage("HKV MessageSink", "New message!!!");
//  }

  /**
   * HKV_LoadMetadata($id); 
   */
  public function LoadMetadata() {
    echo "Lade Metadaten für HKV aus Datenbank...";
  }

  /**
   * HKV_ShowStats($id); 
   */
  public function ShowStats() {
    echo "Statistik für HKV: ";
  }

}

?>
