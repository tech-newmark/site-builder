<?

use Bitrix\Main\EventManager;
use Bitrix\Main\IO;
use Bitrix\Main\Application;

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

  // Полные пути
  $sourcePath = Application::getDocumentRoot() . "/local/php_interface/admin/newmark-template-settings/view.php";
  $targetPath = Application::getDocumentRoot() . "/bitrix/admin/nmark_simple.php";
  $sourceFile = new IO\File($sourcePath);
  $UPDATE_OLD_TEMPLATE = true;

  if ($sourceFile->isExists()) {
    if (!IO\File::isFileExists($targetPath)) {
      IO\File::putFileContents($targetPath, $sourceFile->getContents());
    } else if ($UPDATE_OLD_TEMPLATE) {
      IO\File::putFileContents($targetPath, $sourceFile->getContents());
    }
  } else {
    throw new Exception("Файл шаблона не найден");
  }

  // Добавляем пункт меню
  $arModuleMenu[] = [
    "parent_menu" => "global_menu_settings",
    "section" => "newmark_settings",
    "sort" => 10000,
    "text" => "NEWMARK Simple v1.0.0",
    "title" => "Настройки шаблона NEWMARK Simple v1.0.0",
    "url" => "/bitrix/admin/nmark_simple.php",
    "icon" => "newmark-logo",
  ];

  \Bitrix\Main\Page\Asset::getInstance()->addString(
    '<link rel="stylesheet" href="/local/php_interface/admin/newmark-template-settings/assets/styles/controller.css" type="text/css" />',
  );
}
