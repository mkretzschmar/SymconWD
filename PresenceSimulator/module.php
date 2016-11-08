<?
    class PresenceSimulator extends IPSModule {
 
        // Der Konstruktor des Moduls.
        // Überschreibt den Standard Kontruktor von IPS.
        public function __construct($InstanceID) {
            parent::__construct($InstanceID);
 

        }
 
        // Überschreibt die interne IPS_Create($id) Funktion
        public function Create() {
            parent::Create();
 
        }
 
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            parent::ApplyChanges();
        }
 
        /**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        * ABC_MeineErsteEigeneFunktion($id);
        *
        */
        public function MeineErsteEigeneFunktion() {
            // Selbsterstellter Code
        }
    }
?>