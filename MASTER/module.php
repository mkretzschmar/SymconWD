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
     * GIIZ_Transmit($id);
     *
     */
    public function Transmit($data) {
        echo "Received: ".$data.PHP_EOL;
    }
  }
?>
