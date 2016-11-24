<?php
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
                { "type": "Label", "label": " " },
                { "type": "Label", "label": "Verfügbare Module:" },
                ';
        foreach($modules as $modul => $caption) {
            $this->RegisterPropertyBoolean($modul, false);
            $form = $form.'{ "type": "CheckBox", "name": "'.$modul.'", "caption": "'.$caption.'" },';
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
        
        InstallMetronaHKV();
    }
    
    /**
     *
     * INST_GenerateAutoInstall($id);
     *
     */
    public function GenerateAutoInstall() {
        echo "AutoInstaller wird generiert... \n TODO: Implement";
        
    }
    
    
    /** PRIVATE FUNCTIONS  */
    private function InstallWatchdog() {
        
    }
    
    private function InstallMetronaHKV() {
        echo "Installiere Metrona HKV-Umgebung (TODO: Konfigurator)";
        MDS_AutoConfig($id);
    }
}

?>
