<?
function renderAboutPreviewSection(array $values): void
{
  $DTO = [
    [
      'TITLE' => 'Общие настройки блока:',
      'ITEMS' => [
        [
          'label' => 'Показывать блок',
          'name' => 'ABOUT_PREVIEW_SECTION_ENABLED',
          'type' => 'checkbox',
          'value' => $values['ABOUT_PREVIEW_SECTION_ENABLED'],
        ],
        [
          'label' => 'Сортировка',
          'name' => 'ABOUT_PREVIEW_SECTION_SORT',
          'type' => 'number',
          'value' => $values['ABOUT_PREVIEW_SECTION_SORT'],
        ],
        [
          'label' => 'Вид отображения блока',
          'name' => 'ABOUT_PREVIEW_SECTION_VIEW',
          'type' => 'select',
          'value' => $values['ABOUT_PREVIEW_SECTION_VIEW'],
          'options' => array(
            '--normal' => 'Изображение слева | Контент справа',
            '--reversed' => 'Изображение справа | Контент слева',
          ),
        ],
        [
          'label' => 'Вид отображения элементов раздела:',
          'name' => 'ABOUT_PREVIEW_SECTION_LIST_VIEW',
          'type' => 'select',
          'value' => $values['ABOUT_PREVIEW_SECTION_LIST_VIEW'],
          'options' => array(
            '--row' => 'Сетка в два ряда',
            '--column' => 'Сетка в один ряд',
          ),
        ],
        [
          'label' => 'Расположение контента раздела:',
          'name' => 'ABOUT_PREVIEW_SECTION_CONTENT_POSITION',
          'type' => 'select',
          'value' => $values['ABOUT_PREVIEW_SECTION_CONTENT_POSITION'],
          'options' => array(
            '--align-top' => 'По верху блока',
            '--align-center' => 'По центру блока',
          ),
        ],
      ]
    ]
  ];

  renderSettingsBlock('Блок «О компании»', $DTO);
}
