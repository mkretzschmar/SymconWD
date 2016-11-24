<?php
    class GIIZConfigurator extends IPSModule {
 
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
         *
         * GCFG_Autoconfig($id);
         *
         */
        public function Autoconfig() {
            echo "Autoconfig not implemented yet...\n\n(Sorry, better luck next time)";
        }
        
        /**
         * GCFG_ConfigCommand($id, $cmd); 
         */
        public function ConfigCommand($cmd) {
            echo "Führe Befehl aus: ".$cmd."\n";
            echo IPS_Execute($cmd, "", false, false);
        }
    }
?>