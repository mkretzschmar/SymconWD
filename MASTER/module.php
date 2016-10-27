<?
  // Klassendefinition
  class GIIZMonitoringMaster extends IPSModule {
 
    public function __construct($InstanceID) {
      parent::__construct($InstanceID);
    }

    public function Create() {
      parent::Create();
    }
 
    public function ApplyChanges() {
      parent::ApplyChanges();
    }

    /* 
     * GIIZ_CreateMonitoringReport($id);
     *
     */
    public function CreateMonitoringReport() {
      
    }
    
    /* 
     * GIIZ_Hello($id);
     *
     */
    public function Hello() {
        echo "Hello received".PHP_EOL;
    }
    
    /* 
     * GIIZ_Transmit($id, $data);
     *
     */
    public function Transmit($data) {
        echo "Received: ".$data.PHP_EOL;
    }
  }
?>
