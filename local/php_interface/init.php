<?php

use Bitrix\Main\EventManager;
use Bitrix\Main\IO;
use Bitrix\Main\IO\Application;

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
  $sourceFile = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/template.php";
  $targetFile = $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin/nmark_simple.php";

  // $sourceFile = Application::getDocumentRoot() . "/local/php_interface/admin/newmark-template-settings/template.php";
  // $targetFile = Application::getDocumentRoot() . "/bitrix/admin/nmark_simple.php";
  // Копируем файл, если его нет
  // if (!file_exists($targetFile)) {
  //   if (file_exists($sourceFile)) {
  //     $file = new IO\File($sourceFile);
  //     $file->copy($targetFile);
  //   } else {
  //     throw new \Exception("Файл шаблона не найден");
  //   }
  // }

  if (!file_exists($targetFile)) {
    if (file_exists($sourceFile)) {
      // IO\File::copy($sourceFile, $targetFile);
      CopyDirFiles($sourceFile, $targetFile, true, false);
    } else {
      throw new \Exception("Файл шаблона не найден");
    }
  }

  // Добавляем пункт меню
  $arModuleMenu[] = [
    "parent_menu" => "global_menu_settings",
    "section"     => "newmark_settings",
    "sort"        => 10000,
    "text"        => "NEWMARK Simple v1.0.0",
    "title"       => "Настройки шаблона NEWMARK Simple v1.0.0",
    "url"         => "/bitrix/admin/nmark_simple.php",
    "icon"        => "newmark-logo",
  ];

  // Подключаем стили иконки
  \Bitrix\Main\Page\Asset::getInstance()->addString('
    <style>
        .adm-sub-submenu-block:has(.newmark-logo) .adm-submenu-item-name-link {
          height: fit-content !important;
          display: flex;
          gap: 8px;
          align-items: center;
          padding: 16px 0 !important;
          padding-left: 10px !important;
          font-weight: 500;
          text-decoration: none;
          color: #553333;
        }

        .adm-sub-submenu-block:has(.newmark-logo) .adm-submenu-item-name-link * {
          padding: 0;
        }

        .adm-sub-submenu-block:has(.newmark-logo) .adm-submenu-item-arrow {
          display: none;
        }

        .adm-sub-submenu-block:has(.newmark-logo) .adm-submenu-item-name {
          padding: 0;
          margin: 0;
          height: fit-content;
        }

        .adm-sub-submenu-block:has(.newmark-logo) .newmark-logo {
            background-image: url("/local/php_interface/admin/newmark-template-settings/img/newmark-logo.svg");
            background-size: cover;
            width: 24px;
            height: 24px;
            background-position: center;
            margin-left: 0;
            margin-top: 0;
            padding: 0;
        }
    </style>
  ');
}
