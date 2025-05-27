<?
function renderClientsPreviewSection(array $values): void
{
  $DTO = [
    [
      'TITLE' => 'Общие настройки раздела:',
      'ITEMS' => [
        [
          'label' => 'Показывать раздел:',
          'name' => 'CLIENTS_PREVIEW_SECTION_ENABLED',
          'type' => 'checkbox',
          'value' => $values['CLIENTS_PREVIEW_SECTION_ENABLED'],
        ],
        [
          'label' => 'Сортировка',
          'name' => 'CLIENTS_PREVIEW_SECTION_SORT',
          'type' => 'number',
          'value' => $values['CLIENTS_PREVIEW_SECTION_SORT'],
        ],
        [
          'label' => 'Вид отображения раздела:',
          'name' => 'CLIENTS_PREVIEW_SECTION_VIEW',
          'type' => 'select',
          'value' => $values['CLIENTS_PREVIEW_SECTION_VIEW'],
          'options' => array(
            1 => 'Бегущая строка',
            2 => 'Плитка из трех элементов',
          ),
        ],
        [
          'label' => 'Бегущая строка на всю ширину экрана:',
          'name' => 'CLIENTS_PREVIEW_FULLWIDTH_SLIDER',
          'type' => 'select',
          'value' => $values['CLIENTS_PREVIEW_FULLWIDTH_SLIDER'],
          'options' => array(
            '--containerwidth' => 'Нет',
            '--fullwidth' => 'Да',
          ),
        ],
        [
          'label' => 'Расположение элементов плитки:',
          'name' => 'CLIENTS_PREVIEW_GRID_ALIGN',
          'type' => 'select',
          'value' => $values['CLIENTS_PREVIEW_GRID_ALIGN'],
          'options' => array(
            '--align-center' => 'По центру',
            '--align-left' => 'По левому краю',
          ),
        ],
        [
          'label' => 'Использовать заливку цветом для элементов раздела:',
          'name' => 'CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG',
          'type' => 'select',
          'value' => $values['CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG'],
          'options' => array(
            '--filled-bg-none' => 'Нет',
            '--filled-bg' => 'Да',
          ),
        ],

        [
          'label' => 'Обрамление элементов раздела:',
          'name' => 'CLIENTS_PREVIEW_GRID_ITEM_BORDERED',
          'type' => 'select',
          'value' => $values['CLIENTS_PREVIEW_GRID_ITEM_BORDERED'],
          'options' => array(
            '--bordered-none' => 'Нет',
            '--bordered' => 'Да',
          ),
        ],
        [
          'label' => 'Размер иконок элементов раздела:',
          'name' => 'CLIENTS_PREVIEW_ICON_SIZE',
          'type' => 'select',
          'value' => $values['CLIENTS_PREVIEW_ICON_SIZE'],
          'options' => array(
            '--icon-size-xs' => 'Стандартный',
            '--icon-size-md' => 'Увеличенный',
            '--icon-size-lg' => 'Большой',
          ),
        ],
      ]
    ]
  ];

  renderSettingsBlock('Блок «Наши клиенты»', $DTO);
}
