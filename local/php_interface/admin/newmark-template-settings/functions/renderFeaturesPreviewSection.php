<?
function renderFeaturesPreviewSection(array $values): void
{
  $DTO = [
    [
      'TITLE' => 'Общие настройки блока:',
      'ITEMS' => [
        [
          'label' => 'Показывать блок',
          'name' => 'FEATURES_SECTION_ENABLED',
          'type' => 'checkbox',
          'value' => $values['FEATURES_SECTION_ENABLED'],
        ],
        [
          'label' => 'Сортировка',
          'name' => 'FEATURES_SECTION_SORT',
          'type' => 'number',
          'value' => $values['FEATURES_SECTION_SORT'],
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
        [
          'label' => 'Вид отображения элемента',
          'name' => 'FEATURES_SECTION_VIEW',
          'type' => 'select',
          'value' => $values['FEATURES_SECTION_VIEW'],
          'options' => array(
            1 => 'С заливкой фоном или изображением',
            2 => 'Без заливки'
          ),
        ],
      ]
    ]
  ];

  renderSettingsBlock('Блок «Наши преимущества»', $DTO);
}
