<?php

use Bitrix\Main\Config\Option;

class SiteSettingsManager
{
  /**
   * Проверяем, был ли отправлен POST-запрос и прошла ли проверка sessid.
   */
  public function isFormSubmitted(): bool
  {
    return $_SERVER["REQUEST_METHOD"] === "POST"
      && function_exists('check_bitrix_sessid')
      && check_bitrix_sessid();
  }

  /**
   * Возвращаем текущие настройки из опций
   */
  public function getSettings(): array
  {
    return [
      'content-width' => Option::get("main", "content-width", "1680px"),
      'site-base-font-family' => Option::get("main", "site-base-font-family", "var(--montserrat)"),
      'primary-color' => Option::get("main", "primary-color", "var(--primary-color)"),
      'secondary-color' => Option::get("main", "secondary-color", "var(--secondary-color)"),
      'current-border-radius' => Option::get("main", "current-border-radius", "0"),
      'section-title-color' => Option::get("main", "section-title-color", "var(--dark-color)"),
      'title-underline-color' => Option::get("main", "title-underline-color", "var(--dark-color)"),
      'site-bg-color' => Option::get("main", "site-bg-color", "var(--site-bg-color)"),

      'SITE_LOGO' => Option::get("main", "SITE_LOGO", ""),

      'SECTION_TITLE_UNDERLINE_ENABLED' => Option::get("main", "SECTION_TITLE_UNDERLINE_ENABLED", "N"),
      'SECTION_HEADER_ALIGN' => Option::get("main", "SECTION_HEADER_ALIGN", "--section-headers-align-center"),

      'TOP_BANNER_HEIGHT' => Option::get("main", "TOP_BANNER_HEIGHT", "--fullheight"),
      'TOP_BANNER_BUTTONS_BORDER_RADIUS' => Option::get("main", "TOP_BANNER_BUTTONS_BORDER_RADIUS", "--rounded-relative"),
      'TOP_BANNER_CONTENT_FULLWIDTH' => Option::get("main", "TOP_BANNER_CONTENT_FULLWIDTH", "N"),
      'TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED' => Option::get("main", "TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED", "N"),
      'TOP_BANNER_BLURED_CONTENT_ENABLED' => Option::get("main", "TOP_BANNER_BLURED_CONTENT_ENABLED", "N"),
      'TOP_BANNER_BORDERED_CONTENT_ENABLED' => Option::get("main", "TOP_BANNER_BORDERED_CONTENT_ENABLED", "N"),
      'TOP_BANNER_ROUNDED_CONTENT_ENABLED' => Option::get("main", "TOP_BANNER_ROUNDED_CONTENT_ENABLED", "N"),
      'TOP_BANNER_CONTENT_ALIGN' => Option::get("main", "TOP_BANNER_CONTENT_ALIGN", "--text-left"),
      'TOP_BANNER_PICTURE_FULLHEIGHT' => Option::get("main", "TOP_BANNER_PICTURE_FULLHEIGHT", "N"),
      'TOP_BANNER_PICTURE_ROUNDED_ENABLED' => Option::get("main", "TOP_BANNER_PICTURE_ROUNDED_ENABLED", "N"),
      'TOP_BANNER_SLIDER_PAGINATION_ENABLED' => Option::get("main", "TOP_BANNER_SLIDER_PAGINATION_ENABLED", "N"),
      'TOP_BANNER_SLIDER_PAGINATION_TYPE' => Option::get("main", "TOP_BANNER_SLIDER_PAGINATION_TYPE", "--pagination-bullets-circle"),
      'TOP_BANNER_SLIDER_PAGINATION_SIZE' => Option::get("main", "TOP_BANNER_SLIDER_PAGINATION_SIZE", "--pagination-bullets-size-sm"),

      'FEATURES_SECTION_ENABLED' => Option::get("main", "FEATURES_SECTION_ENABLED", "N"),
      'FEATURES_SECTION_VIEW' => Option::get("main", "FEATURES_SECTION_VIEW", "1"),
      'FEATURES_SECTION_SORT' => Option::get("main", "FEATURES_SECTION_SORT", "100"),

      'ABOUT_PREVIEW_SECTION_ENABLED' => Option::get("main", "ABOUT_PREVIEW_SECTION_ENABLED", "N"),
      'ABOUT_PREVIEW_SECTION_SORT' => Option::get("main", "ABOUT_PREVIEW_SECTION_SORT", "100"),
      'ABOUT_PREVIEW_SECTION_VIEW' => Option::get("main", "ABOUT_PREVIEW_SECTION_VIEW", "--normal"),
      'ABOUT_PREVIEW_SECTION_LIST_VIEW' => Option::get("main", "ABOUT_PREVIEW_SECTION_LIST_VIEW", "--row"),
      'ABOUT_PREVIEW_SECTION_CONTENT_POSITION' => Option::get("main", "ABOUT_PREVIEW_SECTION_CONTENT_POSITION", "--align-top"),

      'CLIENTS_PREVIEW_SECTION_ENABLED' => Option::get("main", "CLIENTS_PREVIEW_SECTION_ENABLED", "N"),
      'CLIENTS_PREVIEW_SECTION_SORT' => Option::get("main", "CLIENTS_PREVIEW_SECTION_SORT", "100"),
      'CLIENTS_PREVIEW_SECTION_VIEW' => Option::get("main", "CLIENTS_PREVIEW_SECTION_VIEW", "1"),
      'CLIENTS_PREVIEW_GRID_ALIGN' => Option::get("main", "CLIENTS_PREVIEW_GRID_ALIGN", "--align-center"),
      'CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG' => Option::get("main", "CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG", "--filled-bg-none"),
      'CLIENTS_PREVIEW_GRID_ITEM_BORDERED' => Option::get("main", "CLIENTS_PREVIEW_GRID_ITEM_BORDERED", "--bordered-none"),
      'CLIENTS_PREVIEW_ICON_SIZE' => Option::get("main", "CLIENTS_PREVIEW_ICON_SIZE", "--icon-size-xs"),
      'CLIENTS_PREVIEW_FULLWIDTH_SLIDER' => Option::get("main", "CLIENTS_PREVIEW_FULLWIDTH_SLIDER", "--containerwidth"),
    ];
  }

  /**
   * Сохраняем новые значения настроек из POST
   */
  public function saveSettings(array $postData): void
  {
    // Получаем текущее значение SITE_LOGO из опций
    $currentSiteLogo = Option::get("main", "SITE_LOGO", "");

    // Обрабатываем загрузку файла
    $newLogoPath = $this->handleLogoUpload($currentSiteLogo);

    // Подготовка данных
    $data = [
      'content-width' => $postData["content-width"] ?? "1680px",
      'site-base-font-family' => $postData["site-base-font-family"] ?? "var(--montserrat)",
      'primary-color' => $postData["primary-color"] ?? "var(--primary-color)",
      'secondary-color' => $postData["secondary-color"] ?? "var(--secondary-color)",
      'current-border-radius' => $postData["current-border-radius"] ?? "Без скругления",
      'section-title-color' => $postData["section-title-color"] ?? "var(--dark-color)",
      'title-underline-color' => $postData["title-underline-color"] ?? "var(--dark-color)",
      'site-bg-color' => $postData["site-bg-color"] ?? "var(--site-bg-color)",

      'SECTION_TITLE_UNDERLINE_ENABLED' => $postData["SECTION_TITLE_UNDERLINE_ENABLED"] ?? "N",
      'SECTION_HEADER_ALIGN' => $postData["SECTION_HEADER_ALIGN"] ?? "--align-center",

      'TOP_BANNER_HEIGHT' => $postData["TOP_BANNER_HEIGHT"] ?? "--fullheight",
      'TOP_BANNER_BUTTONS_BORDER_RADIUS' => $postData["TOP_BANNER_BUTTONS_BORDER_RADIUS"] ?? "--rounded-relative",
      'TOP_BANNER_BLURED_CONTENT_ENABLED' => $postData["TOP_BANNER_BLURED_CONTENT_ENABLED"] ?? "N",
      'TOP_BANNER_BORDERED_CONTENT_ENABLED' => $postData["TOP_BANNER_BORDERED_CONTENT_ENABLED"] ?? "N",
      'TOP_BANNER_ROUNDED_CONTENT_ENABLED' => $postData["TOP_BANNER_ROUNDED_CONTENT_ENABLED"] ?? "N",
      'TOP_BANNER_CONTENT_FULLWIDTH' => $postData["TOP_BANNER_CONTENT_FULLWIDTH"] ?? "N",
      'TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED' => $postData["TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED"] ?? "N",
      'TOP_BANNER_CONTENT_ALIGN' => $postData["TOP_BANNER_CONTENT_ALIGN"] ?? "--text-left",
      'TOP_BANNER_PICTURE_FULLHEIGHT' => $postData["TOP_BANNER_PICTURE_FULLHEIGHT"] ?? "N",
      'TOP_BANNER_PICTURE_ROUNDED_ENABLED' => $postData["TOP_BANNER_PICTURE_ROUNDED_ENABLED"] ?? "N",
      'TOP_BANNER_SLIDER_PAGINATION_ENABLED' => $postData["TOP_BANNER_SLIDER_PAGINATION_ENABLED"] ?? "N",
      'TOP_BANNER_SLIDER_PAGINATION_TYPE' => $postData["TOP_BANNER_SLIDER_PAGINATION_TYPE"] ?? "--pagination-bullets-circle",
      'TOP_BANNER_SLIDER_PAGINATION_SIZE' => $postData["TOP_BANNER_SLIDER_PAGINATION_SIZE"] ?? "--pagination-bullets-size-sm",

      'FEATURES_SECTION_VIEW' => $postData["FEATURES_SECTION_VIEW"] ?? "1",
      'FEATURES_SECTION_ENABLED' => $postData["FEATURES_SECTION_ENABLED"] ?? "N",
      'FEATURES_SECTION_SORT' => $postData["FEATURES_SECTION_SORT"] ?? "100",

      'ABOUT_PREVIEW_SECTION_ENABLED' => $postData["ABOUT_PREVIEW_SECTION_ENABLED"] ?? "N",
      'ABOUT_PREVIEW_SECTION_SORT' => $postData["ABOUT_PREVIEW_SECTION_SORT"] ?? "100",
      'ABOUT_PREVIEW_SECTION_VIEW' => $postData["ABOUT_PREVIEW_SECTION_VIEW"] ?? "--normal",
      'ABOUT_PREVIEW_SECTION_LIST_VIEW' => $postData["ABOUT_PREVIEW_SECTION_LIST_VIEW"] ?? "--row",
      'ABOUT_PREVIEW_SECTION_CONTENT_POSITION' => $postData["ABOUT_PREVIEW_SECTION_CONTENT_POSITION"] ?? "--align-top",

      'CLIENTS_PREVIEW_SECTION_ENABLED' => $postData["CLIENTS_PREVIEW_SECTION_ENABLED"] ?? "N",
      'CLIENTS_PREVIEW_SECTION_SORT' => $postData["CLIENTS_PREVIEW_SECTION_SORT"] ?? "100",
      'CLIENTS_PREVIEW_SECTION_VIEW' => $postData["CLIENTS_PREVIEW_SECTION_VIEW"] ?? "1",
      'CLIENTS_PREVIEW_GRID_ALIGN' => $postData["CLIENTS_PREVIEW_GRID_ALIGN"] ?? "--align-center",
      'CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG' => $postData["CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG"] ?? "--filled-bg-none",
      'CLIENTS_PREVIEW_GRID_ITEM_BORDERED' => $postData["CLIENTS_PREVIEW_GRID_ITEM_BORDERED"] ?? "--bordered-none",
      'CLIENTS_PREVIEW_ICON_SIZE' => $postData["CLIENTS_PREVIEW_ICON_SIZE"] ?? "--icon-size-xs",
      'CLIENTS_PREVIEW_FULLWIDTH_SLIDER' => $postData["CLIENTS_PREVIEW_FULLWIDTH_SLIDER"] ?? "--containerwidth",

      'SITE_LOGO' => $newLogoPath,
    ];

    // Сохраняем все настройки
    foreach ($data as $key => $value) {
      Option::set("main", $key, $value);
    }
  }

  /**
   * Обработка загрузки логотипа
   */
  private function handleLogoUpload(string $currentLogo): string
  {
    // Удаление существующего логотипа
    if (!empty($_POST['SITE_LOGO_delete']) && $_POST['SITE_LOGO_delete'] === 'Y') {
      if (!empty($currentLogo) && file_exists($_SERVER['DOCUMENT_ROOT'] . $currentLogo)) {
        unlink($_SERVER['DOCUMENT_ROOT'] . $currentLogo);
      }
      return '';
    }

    // Загрузка нового логотипа
    if (isset($_FILES['SITE_LOGO']) && $_FILES['SITE_LOGO']['error'] === UPLOAD_ERR_OK) {
      $allowedTypes = ['image/png', 'image/svg+xml'];
      $fileType = $_FILES['SITE_LOGO']['type'];

      if (!in_array($fileType, $allowedTypes)) {
        $GLOBALS['APPLICATION']->ThrowException('Допустимы только файлы PNG и SVG');
        return $currentLogo;
      }

      $allowedExtensions = ['png', 'svg'];
      $fileExtension = strtolower(pathinfo($_FILES['SITE_LOGO']['name'], PATHINFO_EXTENSION));
      if (!in_array($fileExtension, $allowedExtensions)) {
        $GLOBALS['APPLICATION']->ThrowException('Недопустимое расширение файла');
        return $currentLogo;
      }

      $uploadDir = '/upload/';
      $absUploadDir = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
      if (!is_dir($absUploadDir)) {
        mkdir($absUploadDir, 0755, true);
      }

      // Удаляем старый файл
      if (!empty($currentLogo) && file_exists($_SERVER['DOCUMENT_ROOT'] . $currentLogo)) {
        unlink($_SERVER['DOCUMENT_ROOT'] . $currentLogo);
      }

      $fileName = preg_replace('/[^a-z0-9\._-]/i', '', basename($_FILES['SITE_LOGO']['name']));
      $filePath = $uploadDir . uniqid() . '_' . $fileName;

      if (move_uploaded_file($_FILES['SITE_LOGO']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $filePath)) {
        return $filePath;
      }
    }

    return $currentLogo;
  }
}

// --- Основной код ---

$settingsManager = new SiteSettingsManager();
$values = $settingsManager->getSettings();

if ($settingsManager->isFormSubmitted()) {
  $settingsManager->saveSettings($_POST);
  $values = $settingsManager->getSettings(); // Обновляем после сохранения
}
