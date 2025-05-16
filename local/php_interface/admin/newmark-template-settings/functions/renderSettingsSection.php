<?
function renderSettingsSection(array $values): void
{
  $fields = [
    [
      'TITLE' => 'Основные настройки:',
      'ITEMS' => [

        [
          'label' => 'Макс. ширина контентной части сайта:',
          'name' => 'content-width',
          'type' => 'select',
          'value' => $values['content-width'],
          'options' => array(
            '1240px' => '1240px',
            '1440px' => '1440px',
            '1680px' => '1680px',
            '1920px' => '1920px',
          ),
        ],
        [
          'label' => 'Скругления блоков:',
          'name' => 'base-border-radius',
          'type' => 'select',
          'value' => $values['base-border-radius'],
          'options' => array(
            '0' => 'Без скругления',
            '5px' => '5px',
            '10px' => '10px',
            '15px' => '15px',
            '30px' => '30px',
          ),
        ],
      ]
    ],
    [
      'TITLE' => 'Типографика:',
      'ITEMS' => [
        [
          'label' => 'Семейство шрифтов:',
          'name' => 'site-base-font-family',
          'type' => 'select',
          'value' => $values['site-base-font-family'],
          'options' => array(
            'var(--montserrat)' => 'Montserrat',
            'var(--roboto)' => 'Roboto',
            'var(--inter)' => 'Inter',
            'var(--manrope)' => 'Manrope',
          ),
        ],
      ],
    ],
    [
      'TITLE' => 'Колористика:',
      'ITEMS' => [
        [
          'label' => 'Основной цвет сайта:',
          'name' => 'primary-color',
          'type' => 'colorpicker',
          'value' => $values['primary-color'],
        ],
        [
          'label' => 'Дополнительный цвет сайта:',
          'name' => 'secondary-color',
          'type' => 'colorpicker',
          'value' => $values['secondary-color'],
        ],
        [
          'label' => 'Цвет фона сайта:',
          'name' => 'site-bg-color',
          'type' => 'colorpicker',
          'value' => $values['site-bg-color'],
        ],
      ]
    ],
    [
      'TITLE' => 'Настройка разделов сайта:',
      'ITEMS' => [
        [
          'label' => 'Позиционирование шапки секции:',
          'name' => 'SECTION_HEADER_ALIGN',
          'type' => 'select',
          'value' => $values['SECTION_HEADER_ALIGN'],
          'options' => array(
            1 => 'По центру',
            2 => 'По левому краю',
            3 => 'По правому краю'
          ),
        ],
        [
          'label' => 'Цвет заголовка раздела:',
          'name' => 'section-title-color',
          'type' => 'select',
          'value' => $values['section-title-color'],
          'options' => array(
            'var(--black-color)' => 'Черный',
            'var(--white-color)' => 'Белый',
            'var(--primary-color)' => 'Основной цвет сайта',
            'var(--secondary-color)' => 'Дополнительный цвет сайта',
          ),
        ],
        [
          'label' => 'Показывать декоративную линию под заголовком:',
          'name' => 'SECTION_TITLE_UNDERLINE_ENABLED',
          'type' => 'checkbox',
          'value' => $values['SECTION_TITLE_UNDERLINE_ENABLED'],
        ],
      ]
    ]
  ];

  renderSettingsBlock('Настройки шаблона', $fields);
}
