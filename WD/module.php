<?
/**
 *
 */
class IPSWatchdog extends IPSModule {
	
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
	}
	/**
	 */
	public function ApplyChanges() {
		parent::ApplyChanges();
		
	}
	/**
	 *
	 * WD_SendState($id);
	 *
	 */
	public function SendState() {
    // TODO: Implement
	}
  
	/**
	 *
	 *
	 * WD_AutoConfig($id);
	 *
	 */
	public function AutoConfig() {
		echo "Instanz-ID: " . $this -> InstanceID. ", IPS Instanzname: " . this -> MyInstanceID;
		$this -> SendRPC();
	}
	################## helper functions / wrapper
	/**
	 */
	private function SendRPC() {
	}
}


?>
