<?
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
         * GCFG_ConfigCommand($cmd); 
         */
        public function ConfigCommand($id, $cmd) {
            echo "Führe Befehl aus: ".$cmd."\n";
        }
    }
?>