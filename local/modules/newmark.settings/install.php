<?php
if (!defined("MODULE_ID")) define("MODULE_ID", "newmark.settings");
IncludeModuleLangFile(__FILE__);

class newmark_settings
{
  function DoInstall()
  {
    $this->InstallFiles();
  }

  function DoUninstall()
  {
    $this->UnInstallFiles();
  }

  function InstallFiles()
  {
    CopyDirFiles(
      $_SERVER["DOCUMENT_ROOT"] . "/local/modules/newmark.settings/options/",
      $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin",
      true,
      false
    );
    return true;
  }

  function UnInstallFiles()
  {
    @unlink($_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin/newmark_settings.php");
    return true;
  }
}
