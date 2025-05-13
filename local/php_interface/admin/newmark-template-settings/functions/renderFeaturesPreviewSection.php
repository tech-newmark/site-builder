<?
function renderFeaturesPreviewSection(array $values): void
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
