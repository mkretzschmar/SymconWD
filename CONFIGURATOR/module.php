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
         * GIIZ_Autoconfig($id);
         *
         */
        public function Autoconfig() {
            echo "Autoconfig not implemented yet...\n\n(Sorry, better luck next time)";
        }
        
        /**
         * GIIZ_ConfigCommand($cmd); 
         */
        public function ConfigCommand($cmd) {
            echo "Führe Befehl aus: ".$cmd."\n";
        }
    }
?>