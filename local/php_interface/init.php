<?php
AddEventHandler("main", "OnBuildGlobalMenu", "addNewmarkSettingsMenu");

function addNewmarkSettingsMenu(&$arGlobalMenu, &$arModuleMenu)
{
  if ($GLOBALS['USER']->IsAdmin()) {
    $arModuleMenu[] = [
      "parent_menu" => "global_menu_settings",
      "section"     => "newmark_settings",
      "sort"        => 90,
      "text"        => "Настройки NewMark",
      "title"       => "Глобальные настройки шаблона сайта",
      "url"         => "/local/modules/newmark.settings/newmark_settings.php",
    ];
  }
}
