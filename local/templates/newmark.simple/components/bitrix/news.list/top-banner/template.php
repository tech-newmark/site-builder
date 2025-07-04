<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["ITEMS"]): ?>
  <section
    class="top-section <?= $arResult["RES_MOD_MODIFIERS"] ?>">
    <div class="swiper top-banner-slider --height-70">
      <div class="swiper-wrapper">
        <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
          <div class="swiper-slide">
            <!-- <? debug($arItem["PROPERTIES"]["OVERLAY_TYPE"]) ?> -->
            <div
              class="top-banner 
                <?= $arItem["PROPERTIES"]["OVERLAY_TYPE"]["VALUE_XML_ID"] && $arItem["PROPERTIES"]["OVERLAY_TYPE"]["VALUE_XML_ID"] !== "N" ? $arItem["PROPERTIES"]["OVERLAY_TYPE"]["VALUE_XML_ID"] : null ?>
                <?= $arItem["PROPERTIES"]["BG_POSITION"]["VALUE_XML_ID"] ? $arItem["PROPERTIES"]["BG_POSITION"]["VALUE_XML_ID"] : '--bg-center-center' ?>
                <?= $arItem["PROPERTIES"]["BANNER_CONTENT_DIRECTION"]["VALUE_XML_ID"] ? $arItem["PROPERTIES"]["BANNER_CONTENT_DIRECTION"]["VALUE_XML_ID"] : null ?>
              "
              style="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ? 'background-image:url(' . $arItem["PREVIEW_PICTURE"]["SRC"] . ')' : null ?>">

              <div class="top-banner__content 
                --blured-content 
                --bordered-content 
                --rounded-content 
                --text-left">

                <? if ($key === 0): ?>
                  <h1 class="main-title"><?= $arItem["NAME"] ?></h1>
                <? else: ?>
                  <h2 class="main-title"><?= $arItem["NAME"] ?></h2>
                <? endif; ?>

                <? if ($arItem["PREVIEW_TEXT"]): ?>
                  <p class="top-banner__text">
                    <?= $arItem["PREVIEW_TEXT"] ?>
                  </p>
                <? endif; ?>

                <? if ($arItem["PROPERTIES"]["LINK_URL"]["VALUE"] || $arItem["PROPERTIES"]["BTN_FORM_ID"]["VALUE"]): ?>
                  <div class="button-row">
                    <? if ($arItem["PROPERTIES"]["BTN_FORM_ID"]["VALUE"]): ?>
                      <button class="btn btn-primary" data-modal-id="<?= $arItem["PROPERTIES"]["BTN_FORM_ID"]["VALUE"] ?>">
                        <span>
                          <?= $arItem["PROPERTIES"]["BTN_TEXT"]["VALUE"] ? $arItem["PROPERTIES"]["BTN_TEXT"]["VALUE"] : 'Заказать' ?>
                        </span>
                      </button>
                    <? endif; ?>
                    <? if ($arItem["PROPERTIES"]["LINK_URL"]["VALUE"]): ?>
                      <a class="btn btn-secondary rounded-md" href="<?= $arItem["PROPERTIES"]["LINK_URL"]["VALUE"] ?>">
                        <span>
                          <?= $arItem["PROPERTIES"]["LINK_TEXT"]["VALUE"] ? $arItem["PROPERTIES"]["LINK_TEXT"]["VALUE"] : 'Подробнее' ?>
                        </span>
                      </a>
                    <? endif; ?>
                  </div>
                <? endif; ?>
              </div>

              <? if ($arItem["DETAIL_PICTURE"]["SRC"]): ?>
                <div class="top-banner__picture --rounded-picture ">
                  <img src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" alt='<?= $arItem["DETAIL_PICTURE"]["DESCRIPTION"] ? $arItem["DETAIL_PICTURE"]["DESCRIPTION"] : $arItem["DETAIL_PICTURE"]["TITLE"] ?>?> ?>' width="600" height="600">
                </div>
              <? endif; ?>

            </div>
          </div>
        <? endforeach; ?>
      </div>
    </div>
  </section>
<? endif; ?>