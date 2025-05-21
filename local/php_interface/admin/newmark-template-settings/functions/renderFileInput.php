<?
function renderFileInput(string $name, ?string $filePath = null): string
{
  $html  = '<div class="file-input-wrapper">';
  $html .= '<input type="file" name="' . $name . '" id="' . $name . '" accept="image/png, image/svg+xml">';
  $html .= '<input type="hidden" name="' . $name . '_current" value="' . htmlspecialcharsbx($filePath) . '">';

  if ($filePath) {
    $html .= '<div class="current-file-preview">';
    $html .= '<span>Текущий файл:</span>';
    $html .= '<img src="' . $filePath . '" width="300" height="300">';

    // Флажок для удаления файла
    $html .= '<div class="current-file-delete-field">';
    $html .= '<input type="checkbox" name="' . $name . '_delete" id="' . $name . '_delete" value="Y">';
    $html .= '<label for="' . $name . '_delete">Удалить файл</label></div>';
    $html .= '</div>';
  }

  $html .= '</div>';
  return $html;
}
