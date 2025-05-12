<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

function renderSettingsBlock(string $title, array $fields): void
{
  echo "<h2>$title</h2>";
  echo '<div>';

  foreach ($fields as $field) {
    $type = $field['type'] ?? 'text';
    $name = $field['name'] ?? '';
    $label = $field['label'] ?? '';
    $value = $field['value'] ?? null;
    $options = $field['options'] ?? [];

    echo "<p>$label</p>";

    echo match ($type) {
      'select' => renderSelect($name, $options, $value),
      'checkbox' => renderCheckbox($name, $value),
      default => "<tr><td>Неизвестный тип поля: $type</td></tr>",
    };
  }

  echo '</div>';
}

function renderSelect(string $name, array $options, $selectedValue = null): string
{
  $html = "<select name=\"$name\">\n";

  foreach ($options as $value => $label) {
    $value = (string)$value;
    $isSelected = ($value === (string)$selectedValue) ? 'selected' : '';
    $html .= "<option value=\"$value\" $isSelected>$label</option>\n";
  }

  $html .= "</select>";

  return $html;
}

function renderCheckbox(string $name, $isChecked = false): string
{
  // Приводим значение к строке 'Y' / ''
  // $checkedValue = ($isChecked === 'Y' || $isChecked === true || $isChecked === 'on' || $isChecked === '1') ? 'Y' : '';
  $isChecked = $isChecked === 'Y' ? 'checked' : '';

  return "
        <input type=\"checkbox\" name=\"$name\" value=\"Y\" $isChecked>
    ";
}

function renderGeneralSettings(array $values): void
{
  $fields = [
    [
      'label' => 'Скругления блоков:',
      'name' => 'OPTION_BORDER_RADIUS',
      'type' => 'select',
      'value' => $values['OPTION_BORDER_RADIUS'],
      'options' => array(
        '1' => 'Без скругления',
        '2' => '5px',
        '3' => '10px',
        '4' => '15px',
        '5' => '30px',
      ),
    ],
  ];

  renderSettingsBlock('Общие настройки сайта', $fields);
}

function renderFeaturesSection(array $values): void
{
  $fields = [
    [
      'label' => 'Показывать раздел',
      'name' => 'FEATURES_SECTION_ENABLED',
      'type' => 'checkbox',
      'value' => $values['FEATURES_SECTION_ENABLED'],
    ],
    [
      'label' => 'Вид отображения блока',
      'name' => 'FEATURES_SECTION_TYPE',
      'type' => 'select',
      'value' => $values['FEATURES_SECTION_TYPE'],
      'options' => array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
      ),
    ],
  ];

  renderSettingsBlock('Блок «Наши преимущества»', $fields);
}
?>

<form method="post" action="<?= $APPLICATION->GetCurPage() ?>">
  <?= bitrix_sessid_post() ?>

  <? renderGeneralSettings($values); ?>
  <? renderFeaturesSection($values); ?>

  <br><br>
  <input type="submit" value="Сохранить">
</form>

<? if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()): ?>
  <div class="adm-info-message">
    <p>Настройки успешно сохранены</p>
  </div>
<? endif; ?>