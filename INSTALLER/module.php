<?
// Klassendefinition
class GIIZInstaller extends IPSModule {

    public function __construct($InstanceID) {
        parent::__construct($InstanceID);
    }
 
    public function Create() {
        parent::Create();
    }
 
    public function ApplyChanges() {
        parent::ApplyChanges();
    }
        
    /**
     * INST_GetConfigurationForm($id);
     */
    public function GetConfigurationForm() {
		return '{ "actions": [ { "type": "Label", "label": "The current time is '.date("d.m.y H:i").'" } ] }';
	}
    
    /**
     *
     * INST_GetVersion($id);
     *
     */
    public function GetVersion() {
        echo "0";
    }
    
    /**
     *
     * INST_Install($id);
     *
     */
    public function Install() {
        echo "Installer wird ausgeführt...";
    }
}

?>
