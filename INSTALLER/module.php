<?php

// Klassendefinition
class GIIZInstaller extends IPSModule {

  static $MODULES = array("Watchdog" => "GIIZ Watchdog", "HKV" => "Metrona HKV Datensammler", "Bla" => "Bla");

  /**
   * ---------------------------------------------------------------------------
   * @param type $InstanceID
   */
  public function __construct($InstanceID) {
    parent::__construct($InstanceID);
  }

  /**
   * ---------------------------------------------------------------------------
   */
  public function Create() {
    parent::Create();
    foreach (GIIZInstaller::$MODULES as $modul => $caption) {
      $this->RegisterPropertyBoolean($modul, false);
    }
  }

  /**
   * ---------------------------------------------------------------------------
   */
  public function ApplyChanges() {
    parent::ApplyChanges();
  }

  /**
   * INST_GetConfigurationForm($id);
   */
  public function GetConfigurationForm() {

    $isInstalled = false;
    $lblText = $isInstalled ? "Aktualisieren" : "Installieren";


    $form = '
        { 
        
        "elements": 
            [
                { "type": "Label", "label": "Letzte Aktualisierung ' . date("d.m.y H:i") . '" },
                { "type": "Label", "label": " " },
                { "type": "Label", "label": "Verfügbare Module:" },
                ';
    foreach (GIIZInstaller::$MODULES as $modul => $caption) {
      $form = $form . '{ "type": "CheckBox", "name": "' . $modul . '", "caption": "' . $caption . '" },';
    }

    $form = $form . '
                { "type": "Label", "label": " " }],
        "actions":
            [
                { "type": "Button", "label": "' . $lblText . '", "onClick": "INST_Install($id);" },
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
   * INST_Install($id);
   *
   */
  public function Install() {
    echo "Installer wird ausgeführt...\nHKV: " . $this->ReadPropertyBoolean("HKV") . "";
    if ($this->ReadPropertyBoolean("HKV")) {
      echo "Installiere HKVs...";
      $this->SetSummary("Installiere HKVs...");
      $this->InstallMetronaHKV();
    }
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
