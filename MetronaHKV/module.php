<?php

class MetronaHKV extends IPSModule {

  public function Create() {
    parent::Create();

    $this->RegisterPropertyString("ReceiveFilter", "1B99*");
  }

  public function ApplyChanges() {
    parent::ApplyChanges();

    //Connect to available splitter or create a new one
    $this->ConnectParent("{6179ED6A-FC31-413C-BB8E-1204150CF376}");

    //Apply filter
    $this->SetReceiveDataFilter($this->ReadPropertyString("ReceiveFilter"));
  }

  public function ReceiveData($JSONString) {
    $data = json_decode($JSONString);
    //Parse and write values to our buffer
    $this->SetBuffer("hkvmessage", utf8_decode($data->Buffer));
    //Print buffer
    IPS_LogMessage("MetronaHKV", $this->GetBuffer("hkvmessage"));
  }

}

?>
