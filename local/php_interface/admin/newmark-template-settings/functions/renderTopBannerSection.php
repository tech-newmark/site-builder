<?
function renderTopBannerSection(array $values): void
{
  $DTO = [
    [
      'TITLE' => 'Общие настройки блока:',
      'ITEMS' => [
        [
          'label' => 'Минимальная высота блока:',
          'name' => 'TOP_BANNER_HEIGHT',
          'type' => 'select',
          'value' => $values['TOP_BANNER_HEIGHT'],
          'options' => array(
            '--fullheight' => 'На всю высоту экрана',
            '--height-30' => 'На 30% высоты экрана',
            '--height-50' => 'На 50% высоты экрана',
            '--height-70' => 'На 70% высоты экрана',
          ),
        ],
        [
          'label' => 'Скругление кнопок по умолчанию:',
          'name' => 'TOP_BANNER_BUTTONS_BORDER_RADIUS',
          'type' => 'select',
          'value' => $values['TOP_BANNER_BUTTONS_BORDER_RADIUS'],
          'options' => array(
            '--rounded-relative' => 'Из настроек шаблона',
            '--rounded-none' => 'Без скругления',
            '--rounded-xs' => '5px',
            '--rounded-sm' => '10px',
            '--rounded-md' => '15px',
            '--rounded-lg' => '30px',
          ),
        ],
      ]
    ],
    [
      'TITLE' => 'Настройки слайдера:',

      'ITEMS' => [
        [
          'label' => 'Навигация:',
          'name' => 'TOP_BANNER_SLIDER_NAVIGATION_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_SLIDER_NAVIGATION_ENABLED'],
        ],
        [
          'label' => 'Размер кнопок навигации:',
          'name' => 'TOP_BANNER_SLIDER_BUTTONS_SIZE',
          'type' => 'select',
          'value' => $values['TOP_BANNER_SLIDER_BUTTONS_SIZE'],
          'options' => array(
            '--size-sm' => 'Стандартные',
            '--size-md' => 'Средние',
            '--size-lg' => 'Большие',
          ),
        ],
        [
          'label' => 'Цвет иконки кнопок навигации:',
          'name' => 'TOP_BANNER_SLIDER_BUTTONS_ICON_COLOR',
          'type' => 'select',
          'value' => $values['TOP_BANNER_SLIDER_BUTTONS_ICON_COLOR'],
          'options' => array(
            '--color-white' => 'Белый',
            '--color-dark' => 'Темный',
            '--color-primary' => 'Основной цвет сайта',
            '--color-secondary' => 'Дополнительный цвет сайта',
          ),
        ],
        [
          'label' => 'Цвет заливки кнопок навигации:',
          'name' => 'TOP_BANNER_SLIDER_BUTTONS_BACKGROUND_COLOR',
          'type' => 'select',
          'value' => $values['TOP_BANNER_SLIDER_BUTTONS_BACKGROUND_COLOR'],
          'options' => array(
            '--background-none' => 'Без заливки',
            '--background-white' => 'Белый',
            '--background-dark' => 'Темный',
            '--background-primary' => 'Основной цвет сайта',
            '--background-secondary' => 'Дополнительный цвет сайта',
          ),
        ],
        [
          'label' => 'Скругление кнопок навигации:',
          'name' => 'TOP_BANNER_SLIDER_BUTTONS_ROUNDED_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_SLIDER_BUTTONS_ROUNDED_ENABLED'],
        ],
        [
          'label' => 'Обрамление кнопок навигации:',
          'name' => 'TOP_BANNER_SLIDER_BUTTONS_BORDER_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_SLIDER_BUTTONS_BORDER_ENABLED'],
        ],
        [
          'label' => 'Цвет обрамления кнопок навигации:',
          'name' => 'TOP_BANNER_SLIDER_BUTTONS_BORDER_COLOR',
          'type' => 'select',
          'value' => $values['TOP_BANNER_SLIDER_BUTTONS_BORDER_COLOR'],
          'options' => array(
            '--bordered-white' => 'Белый',
            '--bordered-dark' => 'Темный',
            '--bordered-primary' => 'Основной цвет сайта',
            '--bordered-secondary' => 'Дополнительный цвет сайта',
          ),
        ],
        [
          'label' => 'Пагинация:',
          'name' => 'TOP_BANNER_SLIDER_PAGINATION_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_SLIDER_PAGINATION_ENABLED'],
        ],
        [
          'label' => 'Тип буллетов пагинации:',
          'name' => 'TOP_BANNER_SLIDER_PAGINATION_TYPE',
          'type' => 'select',
          'value' => $values['TOP_BANNER_SLIDER_PAGINATION_TYPE'],
          'options' => array(
            '--pagination-bullets-circle' => 'Круглые',
            '--pagination-bullets-square' => 'Квадратные',
            '--pagination-bullets-rectangle' => 'Прямоугольные',
            '--pagination-bullets-rectangle-wide' => 'Растянутые прямоугольные',
          ),
        ],
        [
          'label' => 'Размер буллетов пагинации:',
          'name' => 'TOP_BANNER_SLIDER_PAGINATION_SIZE',
          'type' => 'select',
          'value' => $values['TOP_BANNER_SLIDER_PAGINATION_SIZE'],
          'options' => array(
            '--pagination-bullets-size-sm' => 'Маленьние',
            '--pagination-bullets-size-md' => 'Средние',
            '--pagination-bullets-size-lg' => 'Большие',
          ),
        ],
      ]
    ],
    [
      'TITLE' => 'Настройки по умолчанию для контентного блока баннера:',
      'ITEMS' => [
        [
          'label' => 'На всю ширину экрана:',
          'name' => 'TOP_BANNER_CONTENT_FULLWIDTH',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_CONTENT_FULLWIDTH'],
        ],

        [
          'label' => 'Расположение контентного блока слева:',
          'name' => 'TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED'],
        ],

        [
          'label' => 'Эффект стекла:',
          'name' => 'TOP_BANNER_BLURED_CONTENT_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_BLURED_CONTENT_ENABLED'],
        ],

        [
          'label' => 'Обрамление:',
          'name' => 'TOP_BANNER_BORDERED_CONTENT_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_BORDERED_CONTENT_ENABLED'],
        ],

        [
          'label' => 'Скругление:',
          'name' => 'TOP_BANNER_ROUNDED_CONTENT_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_ROUNDED_CONTENT_ENABLED'],
        ],

        [
          'label' => 'Позиционирование содержимого:',
          'name' => 'TOP_BANNER_CONTENT_ALIGN',
          'type' => 'select',
          'value' => $values['TOP_BANNER_CONTENT_ALIGN'],
          'options' => array(
            '--content-align-left' => 'Cлева',
            '--content-align-center' => 'По центру',
            '--content-align-right' => 'Справа',
          ),
        ],
      ]
    ],
    [
      'TITLE' => 'Настройки по умолчанию для блока с контентным изображением:',
      'ITEMS' => [
        [
          'label' => 'На всю высоту экрана:',
          'name' => 'TOP_BANNER_PICTURE_FULLHEIGHT',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_PICTURE_FULLHEIGHT'],
        ],
        [
          'label' => 'Скругление:',
          'name' => 'TOP_BANNER_PICTURE_ROUNDED_ENABLED',
          'type' => 'checkbox',
          'value' => $values['TOP_BANNER_PICTURE_ROUNDED_ENABLED'],
        ],
      ]
    ]
  ];

  renderSettingsBlock('Верхний блок с баннером', $DTO);
}
