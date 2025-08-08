<?
function renderFaqSection(array $values): void
{
  $DTO = [
    [
      'TITLE' => 'Общие настройки блока:',
      'ITEMS' => [
        [
          'label' => 'Показывать блок',
          'name' => 'FAQ_SECTION_ENABLED',
          'type' => 'checkbox',
          'value' => $values['FAQ_SECTION_ENABLED'],
        ],
        [
          'label' => 'Сортировка',
          'name' => 'FAQ_SECTION_SORT',
          'type' => 'number',
          'value' => $values['FAQ_SECTION_SORT'],
        ],
        [
          'label' => 'Вид отображения:',
          'name' => 'FAQ_SECTION_VIEW',
          'type' => 'select',
          'value' => $values['FAQ_SECTION_VIEW'],
          'options' => array(
            '--vertical-view' => 'Вертикальное',
            '--horizontal-view' => 'Горизонтальное',
          ),
        ],
      ]
    ],
    [
      'TITLE' => 'Настройки списка вопросов:',
      'ITEMS' => [
        [
          'label' => 'Максимальная ширина списка:',
          'name' => 'FAQ_SECTION_ACCORDEON_MAXWIDTH',
          'type' => 'select',
          'value' => $values['FAQ_SECTION_ACCORDEON_MAXWIDTH'],
          'options' => array(
            '--fullwidth' => 'На всю ширину',
            '--width-sm' => '640px',
            '--width-md' => '960px',
            '--width-lg' => '1140px',
          ),
        ],
        [
          'label' => 'Вид отображения списка вопросов:',
          'name' => 'FAQ_SECTION_ACCORDEON_VIEW',
          'type' => 'select',
          'value' => $values['FAQ_SECTION_ACCORDEON_VIEW'],
          'options' => array(
            '--collapsed-default' => 'Аккордеон (свернут)',
            '--js--expanded-first-default' => 'Аккордеон (первый элемент развернут)',
            '--expanded-default' => 'Список',
          ),
        ],
        [
          'label' => 'Сворачивать неактивные элементы аккордеона:',
          'name' => 'FAQ_SECTION_ACCORDEON_TOGGLEMODE',
          'type' => 'checkbox',
          'value' => $values['FAQ_SECTION_ACCORDEON_TOGGLEMODE'],
        ],
        [
          'label' => 'Обрамление элементов списка:',
          'name' => 'FAQ_SECTION_ACCORDEON_BORDERED',
          'type' => 'checkbox',
          'value' => $values['FAQ_SECTION_ACCORDEON_BORDERED'],
        ],
        [
          'label' => 'Скругление элементов списка:',
          'name' => 'FAQ_SECTION_ACCORDEON_ROUNDED',
          'type' => 'checkbox',
          'value' => $values['FAQ_SECTION_ACCORDEON_ROUNDED'],
        ],
      ]
    ]
  ];

  renderSettingsBlock('Блок «FAQ»', $DTO);
}
