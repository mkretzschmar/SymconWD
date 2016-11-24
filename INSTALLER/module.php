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
        
        $isInstalled = false;
        $lblText = $isInstalled ? "Aktualisieren" : "Installieren";
        
        $modules = array("Watchdog", "HKV", "Bla");
        $form = '
        { 
        
        "actions": 
            [
                { "type": "Label", "label": "Letzte Aktualisierung '.date("d.m.y H:i").'" },
                ';
        foreach($modules as $modul ) {
            $form = $form.'{ "type": "Button", "label": "'.$modul.'", "onClick": "INST_Install($id);" }';
        }
        
        $form = $form.'
                { "type": "Button", "label": "'.$lblText.'", "onClick": "INST_Install($id);" }
            ] }
        
        ';
        
        return $form;
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
     * INST_Install($id, $mode);
     *
     */
    public function Install() {
        echo "Installer wird ausgeführt...";
    }
}

?>
