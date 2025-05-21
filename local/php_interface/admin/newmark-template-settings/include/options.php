<?

use Bitrix\Main\Config\Option;

/**
 * Проверяем, был ли отправлен POST-запрос и прошёл ли проверка sessid.
 */
function isFormSubmitted(): bool
{
  return $_SERVER["REQUEST_METHOD"] === "POST" && function_exists('check_bitrix_sessid') && check_bitrix_sessid();
}

/**
 * Возвращаем текущие настройки из опций
 */
function getSettings(): array
{
  return [
    'content-width' => Option::get("main", "content-width", "1680px"),
    'site-base-font-family' => Option::get("main", "site-base-font-family", "var(--montserrat)"),
    'primary-color' => Option::get("main", "primary-color", "var(--primary-color)"),
    'secondary-color' => Option::get("main", "secondary-color", "var(--secondary-color)"),
    'base-border-radius' => Option::get("main", "base-border-radius", "Без скругления"),
    'section-title-color' => Option::get("main", "section-title-color", "var(--dark-color)"),
    'title-underline-color' => Option::get("main", "title-underline-color", "var(--dark-color)"),
    'site-bg-color' => Option::get("main", "site-bg-color", "var(--site-bg-color)"),

    'SITE_LOGO' => Option::get("main", "SITE_LOGO", ""),

    'SECTION_TITLE_UNDERLINE_ENABLED' => Option::get("main", "SECTION_TITLE_UNDERLINE_ENABLED", "N"),
    'SECTION_HEADER_ALIGN' => Option::get("main", "SECTION_HEADER_ALIGN", "По центру"),

    'FEATURES_SECTION_VIEW' => Option::get("main", "FEATURES_SECTION_VIEW", "Грид-сетка из пяти элементов"),
    'FEATURES_SECTION_ENABLED' => Option::get("main", "FEATURES_SECTION_ENABLED", "N"),
    'FEATURES_SECTION_SORT' => Option::get("main", "FEATURES_SECTION_SORT", "100"),

    'ABOUT_PREVIEW_SECTION_ENABLED' => Option::get("main", "ABOUT_PREVIEW_SECTION_ENABLED", "N"),
    'ABOUT_PREVIEW_SECTION_SORT' => Option::get("main", "ABOUT_PREVIEW_SECTION_SORT", "100"),
    'ABOUT_PREVIEW_SECTION_VIEW' => Option::get("main", "ABOUT_PREVIEW_SECTION_VIEW", "Изображение слева | Контент справа"),
    'ABOUT_PREVIEW_SECTION_LIST_VIEW' => Option::get("main", "ABOUT_PREVIEW_SECTION_LIST_VIEW", "Сетка в два ряда"),
    'ABOUT_PREVIEW_SECTION_CONTENT_POSITION' => Option::get("main", "ABOUT_PREVIEW_SECTION_CONTENT_POSITION", "По верху блока"),
  ];
}

/**
 * Сохраняем новые значения настроек из POST
 */
function saveSettings(array $postData): void
{
  // Получаем текущее значение SITE_LOGO из опций
  $currentSiteLogo = Option::get("main", "SITE_LOGO", "");

  // Подготовка данных с учетом текущего значения логотипа
  $data = [
    'content-width' => $postData["content-width"] ?? "1680px",
    'site-base-font-family' => $postData["site-base-font-family"] ?? "var(--montserrat)",
    'primary-color' => $postData["primary-color"] ?? "var(--primary-color)",
    'secondary-color' => $postData["secondary-color"] ?? "var(--secondary-color)",
    'base-border-radius' => $postData["base-border-radius"] ?? "Без скругления",
    'section-title-color' => $postData["section-title-color"] ?? "var(--dark-color)",
    'title-underline-color' => $postData["title-underline-color"] ?? "var(--dark-color)",
    'site-bg-color' => $postData["site-bg-color"] ?? "var(--site-bg-color)",

    'SECTION_TITLE_UNDERLINE_ENABLED' => $postData["SECTION_TITLE_UNDERLINE_ENABLED"] ?? "N",
    'SECTION_HEADER_ALIGN' => $postData["SECTION_HEADER_ALIGN"] ?? "По центру",
    'FEATURES_SECTION_VIEW' => $postData["FEATURES_SECTION_VIEW"] ?? "Грид-сетка из пяти элементов",
    'FEATURES_SECTION_ENABLED' => $postData["FEATURES_SECTION_ENABLED"] ?? "N",
    'FEATURES_SECTION_SORT' => $postData["FEATURES_SECTION_SORT"] ?? "100",

    'ABOUT_PREVIEW_SECTION_ENABLED' => $postData["ABOUT_PREVIEW_SECTION_ENABLED"] ?? "N",
    'ABOUT_PREVIEW_SECTION_SORT' => $postData["ABOUT_PREVIEW_SECTION_SORT"] ?? "100",
    'ABOUT_PREVIEW_SECTION_VIEW' => $postData["ABOUT_PREVIEW_SECTION_VIEW"] ?? "Изображение слева | Контент справа",
    'ABOUT_PREVIEW_SECTION_LIST_VIEW' => $postData["ABOUT_PREVIEW_SECTION_LIST_VIEW"] ?? "Сетка в два ряда",
    'ABOUT_PREVIEW_SECTION_CONTENT_POSITION' => $postData["ABOUT_PREVIEW_SECTION_CONTENT_POSITION"] ?? "По верху блока",

    // По умолчанию сохраняем текущий логотип
    'SITE_LOGO' => $currentSiteLogo,
  ];

  // --- Обработка загрузки файла ---
  if (isset($_FILES['SITE_LOGO']) && $_FILES['SITE_LOGO']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/png', 'image/svg+xml'];
    $fileType = $_FILES['SITE_LOGO']['type'];

    if (!in_array($fileType, $allowedTypes)) {
      $GLOBALS['APPLICATION']->ThrowException('Допустимы только файлы PNG и SVG');
      return;
    }

    // Проверка расширения файла
    $allowedExtensions = ['png', 'svg'];
    $fileExtension = strtolower(pathinfo($_FILES['SITE_LOGO']['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
      $GLOBALS['APPLICATION']->ThrowException('Недопустимое расширение файла');
      return;
    }

    // Загружаем файл
    $uploadDir = '/upload/';
    $absUploadDir = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;

    if (!is_dir($absUploadDir)) {
      mkdir($absUploadDir, 0755, true);
    }

    // Удаляем старый файл, если он есть
    if (!empty($currentSiteLogo) && file_exists($_SERVER['DOCUMENT_ROOT'] . $currentSiteLogo)) {
      unlink($_SERVER['DOCUMENT_ROOT'] . $currentSiteLogo);
    }

    // Сохраняем новый файл
    $fileName = preg_replace('/[^a-z0-9\._-]/i', '', basename($_FILES['SITE_LOGO']['name']));
    $filePath = $uploadDir . uniqid() . '_' . $fileName;

    if (move_uploaded_file($_FILES['SITE_LOGO']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $filePath)) {
      $data['SITE_LOGO'] = $filePath;
    }
  }

  // --- Обработка удаления файла ---
  if (!empty($_POST['SITE_LOGO_delete']) && $_POST['SITE_LOGO_delete'] === 'Y') {
    // Удаляем текущий файл
    if (!empty($currentSiteLogo) && file_exists($_SERVER['DOCUMENT_ROOT'] . $currentSiteLogo)) {
      unlink($_SERVER['DOCUMENT_ROOT'] . $currentSiteLogo);
    }

    // Очищаем значение логотипа
    $data['SITE_LOGO'] = '';
  }

  // --- Сохранение всех настроек ---
  foreach ($data as $key => $value) {
    \Bitrix\Main\Config\Option::set("main", $key, $value);
  }
}

// --- Основной код ---

$values = getSettings();

if (isFormSubmitted()) {
  saveSettings($_POST);
  $values = getSettings(); // Обновляем после сохранения
}
