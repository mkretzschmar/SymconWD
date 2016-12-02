<?php

/**
 *
 */
class GIIZWatchdogSlave extends IPSModule {

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
    $this->RegisterPropertyBoolean("WDActive", true);
    $this->RegisterPropertyString("MyInstanceID", gethostname());
    $this->RegisterPropertyString("host_port", "127.0.0.1:3777");
    $this->RegisterPropertyString("RPCUser", "user");
    $this->RegisterPropertyString("RPCPass", "password");
    $this->RegisterPropertyInteger("Interval", 60);
    $this->RegisterPropertyBoolean("SetRootName", true);
    $this->RegisterPropertyBoolean("SystemWDActive", true);
    $this->RegisterPropertyInteger("TresholdHDD", 512);
    $this->RegisterPropertyBoolean("DatabaseWDActive", false);
    $this->RegisterPropertyInteger("TresholdDB", 512);
  }

  /**
   */
  public function ApplyChanges() {
    parent::ApplyChanges();
  }

  /**
   *
   * GWD_SendState($id);
   *
   */
  public function SendState() {
    $this->SendRPC();
  }

  /**
   *
   *
   * GWD_AutoConfig($id);
   *
   */
  public function AutoConfig() {
    $MyInstanceID = $this->ReadPropertyString("MyInstanceID");
    echo "Instanz-ID: " . $this->InstanceID . ", IPS Instanzname: " . $MyInstanceID;
    $this->SendRPC();

    IPS_SetName(0, $MyInstanceID);
  }

  /**
   */
  public function TestConnection() {
    try {
      // ttp://user:password@127.0.0.1:3777/api/
      $user = $this->ReadPropertyString("RPCUser");
      $pass = $this->ReadPropertyString("RPCPass");
      $host_port = $this->ReadPropertyString("host_port");
      $connectionString = "http://" . $user . ":" . $pass . "@" . $host_port . "/api/";
      $this->SendDebug("CONNECT", "Trying to connect to " . $host_port, 0);
      $rpc = new JSONRPC($connectionString);
      $result = $rpc->IPS_GetKernelVersion();
      echo "Verbindungstest erfolgreich. KernelVersion: " . $result;
      $this->SendDebug("RESULT", "SUCCESS. Remote Instance Kernel Version: ".$result, 0);
    } catch (Exception $e) {
      echo 'Exception abgefangen: ', $e->getMessage(), "\n";
      $this->SendDebug("ERROR", $e->getMessage(), 0);
    }
  }

  ################## helper functions / wrapper ################################

  private function SendRPC() {
    try {
      // ttp://user:password@127.0.0.1:3777/api/
      $user = $this->ReadPropertyString("RPCUser");
      $pass = $this->ReadPropertyString("RPCPass");
      $host_port = $this->ReadPropertyString("host_port");
      $connectionString = "http://" . $user . ":" . $pass . "@" . $host_port . "/api/";
      $this->SendDebug("CONNECT", "Trying to connect to " . $host_port, 0);
      $rpc = new JSONRPC($connectionString);
      $result = $rpc->GWDM_Hello(0);
      echo "Result: " . $result;
      $this->SendDebug("RESULT", $result, 0);
    } catch (Exception $e) {
      echo 'Exception abgefangen: ', $e->getMessage(), "\n";
      $this->SendDebug("ERROR", $e->getMessage(), 0);
    }
  }

}

?>
