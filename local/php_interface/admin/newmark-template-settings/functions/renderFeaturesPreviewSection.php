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
          'name' => 'FEATURES_SECTION_VIEW',
          'type' => 'select',
          'value' => $values['FEATURES_SECTION_VIEW'],
          'options' => array(
            1 => 'Грид-сетка из пяти элементов',
            2 => 'Грид-сетка из четырех элементов',
            3 => 'Грид-сетка из трех элементов',
            4 => 'Сетка из четырех элементов',
            5 => 'Резиновая сетка из четырех элементов',
            6 => 'Сетка из трех элементов',
            7 => 'Резиновая сетка из трех элементов',
          ),
        ],

      ]
    ]
  ];

  renderSettingsBlock('Блок «Наши преимущества»', $DTO);
}
