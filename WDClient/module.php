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
		$this -> RegisterPropertyString("MyInstanceID", gethostname());
		$this -> RegisterPropertyBoolean("SetRootName", true);
		$this -> RegisterPropertyBoolean("WDActive", false);
		$this -> RegisterPropertyBoolean("SystemWDActive", true);
		$this -> RegisterPropertyInteger("TresholdHDD", 512);
		$this -> RegisterPropertyBoolean("DatabaseWDActive", false);
		$this -> RegisterPropertyInteger("TresholdDB", 512);
		$this -> RegisterPropertyString("ConnectionString", "http://user:password@127.0.0.1:3777/api/");
		$this -> RegisterPropertyInteger("Interval", 60);
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
		$this -> SendRPC();
	}
  
	/**
	 *
	 *
	 * GWD_AutoConfig($id);
	 *
	 */
	public function AutoConfig() {
		$MyInstanceID = $this -> ReadPropertyString('MyInstanceID');
		echo "Instanz-ID: " . $this -> InstanceID. ", IPS Instanzname: " . $MyInstanceID;
		$this -> SendRPC();
		
		IPS_SetName(0, $MyInstanceID); 
	}
	################## helper functions / wrapper
	/**
	 */
	private function SendRPC() {
		$rpc = new JSONRPC($this -> ReadPropertyString('ConnectionString'));
		$result = $rpc->IPS_GetKernelVersion();
		echo "KernelVersion: ".$result;
	}
}


?>
