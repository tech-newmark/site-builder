<?php

use Bitrix\Main\EventManager;
use Bitrix\Main\IO;

// Регистрация обработчика события
EventManager::getInstance()->addEventHandler(
  'main',
  'OnBuildGlobalMenu',
  'addNewmarkSettingsMenuD7'
);

function addNewmarkSettingsMenuD7(&$arGlobalMenu, &$arModuleMenu)
{
  global $USER;

  if (!$USER->IsAdmin()) {
    return;
  }

  // Пути
  $sourceFile = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/templates/nmark_simple_settings_template.php";
  $targetFile = $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin/nmark_simple.php";

  // Копируем файл, если его нет
  if (!file_exists($targetFile)) {
    if (file_exists($sourceFile)) {
      $file = new IO\File($sourceFile);
      $file->copy($targetFile);
    } else {
      // Логирование или вывод ошибки
      throw new \Exception("Файл шаблона не найден");
    }
  }

  // Добавляем пункт меню
  $arModuleMenu[] = [
    "parent_menu" => "global_menu_settings",
    "section"     => "newmark_settings",
    "sort"        => 90,
    "text"        => "NewMark Simple v1.0.0",
    "title"       => "Настройки шаблона NewMark Simple v1.0.0",
    "url"         => "/bitrix/admin/nmark_simple.php",
  ];
}
