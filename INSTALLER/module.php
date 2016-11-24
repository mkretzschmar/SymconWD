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
        
        $modules = array("Watchdog" => "GIIZ Watchdog", "HKV" => "Metrona HKV Datensammler", "Bla" => "Bla");
        $form = '
        { 
        
        "actions": 
            [
                { "type": "Label", "label": "Letzte Aktualisierung '.date("d.m.y H:i").'" },
                ';
        foreach($modules as $modul => $caption) {
            $form = $form.'{ "type": "CheckBox", "name": "'.$modul.'", "caption": "'.$modul.'" },';
        }
        
        $form = $form.'
                { "type": "Button", "label": "'.$lblText.'", "onClick": "INST_Install($id);" },
                { "type": "Button", "label": "Erzeuge AutoInstaller-Datei", "onClick": "INST_GenerateAutoInstall($id);" }
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
    
    /**
     *
     * INST_GenerateAutoInstall($id);
     *
     */
    public function GenerateAutoInstall() {
        echo "AutoInstaller wird generiert... \n TODO: Implement";
        
    }
}

?>
