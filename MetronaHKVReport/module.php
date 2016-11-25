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
   * HKVR_LoadMetadata($id); 
   */
  public function LoadMetadata() {
    echo "Lade Metadaten für HKV aus Datenbank...";
  }

  /**
   * HKVR_ShowStats($id); 
   */
  public function ShowStats() {
    echo "Statistik für HKV: ";
    
    // Liste aller HKV (Children of category 'Heizkostenverteiler', @TODO: user can select hkv root category)
    $hkvroot =  
    
  }
  
    /**
   * HKVR_GenerateReport($id); 
   */
  public function GenerateReport() {
    echo "Bericht für HKV wird erzeugt.";
    
    
  }

}

?>
