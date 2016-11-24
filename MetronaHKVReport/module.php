<?php

/**
 * 
 */
class MetronaHKVReport extends IPSModule {

  /**
   * 
   */
  public function Create() {
    parent::Create();

    //$this->RegisterPropertyString("ReceiveFilter", "1B99*");
  }

  /**
   * 
   */
  public function ApplyChanges() {
    parent::ApplyChanges();

  }

  /**
   * HKV_LoadMetadata($id); 
   */
  public function LoadMetadata() {
    echo "Lade Metadaten für HKV aus Datenbank...";
  }

  /**
   * HKV_ShowStats($id); 
   */
  public function ShowStats() {
    echo "Statistik für HKV: ";
    
    
  }

}

?>
