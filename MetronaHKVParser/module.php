<?php

/**
 * 
 */
class MetronaHKVParser extends IPSModule {

  /**
   * 
   */
  public function Create() {
    parent::Create();

    //$this->RegisterPropertyString("ReceiveFilter", "1B99*");
  }

  /**
   * 
   */
  public function ApplyChanges() {
    parent::ApplyChanges();

    //Connect to available splitter (Datensammler) or create a new one
    //$this->ConnectParent("{6179ED6A-FC31-413C-BB8E-1204150CF376}");

    $this->ConnectParent("{3D704922-660A-43D1-9145-539552DD4EC6}");

    //Apply filter
    $this->SetReceiveDataFilter($this->ReadPropertyString("ReceiveFilter"));
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
    
    
    // Parse data, refresh state variables
  }

  /**
   * 
   */
  public function MessageSink($TimeStamp, $SenderID, $Message, $Data) {

    IPS_LogMessage("HKV MessageSink", "New message!!!");
  }

  /**
   * HKVP_ParseMessage($id, $Msg); 
   */
  public function ParseMessage($Msg) {
    echo "Nachricht wird verarbeitet: ".$Msg;
  }

}

?>
