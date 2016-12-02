<?php

// Klassendefinition
class GIIZMySQLConnector extends IPSModule {

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
   * DBS_ConnectDatabase($id);
   */
  public function ConnectDatabase() {
    // Selbsterstellter Code
  }

  /**
   * DBS_ConnectDatabase($id);
   */
  public function DisconnectDatabase() {
    // Selbsterstellter Code
  }

  /**
   * DBS_SyncDatabase($id);
   */
  public function SyncDatabase() {
    // Selbsterstellter Code
  }

}

?>
