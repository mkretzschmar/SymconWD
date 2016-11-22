<?
    // Klassendefinition
    class GIIZInstaller extends IPSModule {
 
        // Der Konstruktor des Moduls
        // Überschreibt den Standard Kontruktor von IPS
        public function __construct($InstanceID) {
            // Diese Zeile nicht löschen
            parent::__construct($InstanceID);
 
            // Selbsterstellter Code
        }
 
        // Überschreibt die interne IPS_Create($id) Funktion
        public function Create() {
            // Diese Zeile nicht löschen.
            parent::Create();
 
        }
 
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();
        }
        
        /**
         * GIIZ_GetConfigurationForm($id);
         */
        public function GetConfigurationForm()
		{
			
			return '{ "actions": [ { "type": "Label", "label": "The current time is '.date("d.m.y H:i").'" } ] }';
		
		}
    
        /**
         *
         * GIIZ_Install($id);
         *
         */
        public function GetVersion() {
            echo "0";
        }
        /**
         *
         * GIIZ_Install($id);
         *
         */
        public function Install() {
            echo "Installer wird ausgeführt...";
        }
    }
?>
