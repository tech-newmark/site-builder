<?php
if (!defined("MODULE_ID")) define("MODULE_ID", "newmark.settings");

class newmark_settings
{
  function DoUninstall()
  {
    $this->UnInstallFiles();
    return true;
  }
}
