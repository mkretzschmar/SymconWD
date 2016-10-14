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
		$this -> RegisterPropertyString("InstanceID", gethostname());
		$this -> RegisterPropertyString("BrokerURL", "iot.eclipse.org");
		$this -> RegisterPropertyInteger("Port", 1883);
		$this -> RegisterPropertyBoolean("CleanSession", true);

	}
	/**
	 */
	public function ApplyChanges() {
		parent::ApplyChanges();
		// DO NOT EDIT OR DELETE THIS LINE!
	}
	/**
	 *
	 * WD_SendState();
	 *
	 */
	public function SendState() {
    // TODO: Implement
	}
  
	/**
	 *
	 *
	 * WD_AutoConfig();
	 *
	 */
	public function AutoConfig() {
		echo "InstanceID: " . $this -> InstanceID;
		$this -> SendRPC();
	}
	################## helper functions / wrapper
	/**
	 */
	private function SendRPC() {
	}
}


?>
