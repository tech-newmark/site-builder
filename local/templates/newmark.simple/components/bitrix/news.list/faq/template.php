<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?
// debug($GLOBALS["FAQ_SECTION_ENABLED"]);
// debug($GLOBALS["FAQ_SECTION_SORT"]);
// debug($GLOBALS["FAQ_SECTION_VIEW"]);
// debug($GLOBALS["FAQ_SECTION_ACCORDEON_MAXWIDTH"]);
// debug($GLOBALS["FAQ_SECTION_ACCORDEON_VIEW"]);
// debug($GLOBALS["FAQ_SECTION_ACCORDEON_TOGGLEMODE"]);
// debug($GLOBALS["FAQ_SECTION_ACCORDEON_BORDERED"]);
// debug($GLOBALS["FAQ_SECTION_ACCORDEON_ROUNDED"]);
?>
<? if ($arResult["ITEMS"] && $GLOBALS['FAQ_SECTION_ENABLED'] === "Y"): ?>
	<section
		class="base-section faq <?= $arResult["RES_MOD_MODIFIERS"] ?>"
		style="order: <?= $GLOBALS['FAQ_SECTION_SORT'] ?>">

		<div class="container">
			<div class="base-section__header">
				<h2 class="base-title"><?= $arResult["NAME"] ?></h2>
				<p class="base-text"><?= $arResult["DESCRIPTION"] ?></p>
			</div>

			<ul class="accordeon <?= $arResult["RES_MOD_ACCORDEON_MODIFIERS"] ?>">
				<? foreach ($arResult["ITEMS"] as $arItem):
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
					<li class="accordeon__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
						<div class="accordeon__item-header" tabindex="0" aria-label="Развернуть" role="button">
							<span class="base-text">
								<?= $arItem["NAME"] ?>
							</span>
							<svg width="24" height="24" aria-hidden="true">
								<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/sprite.svg#cross"></use>
							</svg>
						</div>
						<div class="accordeon__item-body">
							<div class="content-block">
								<?= $arItem["PREVIEW_TEXT"] ?>
							</div>
						</div>
					</li>
				<? endforeach; ?>
			</ul>
		</div>
	</section>
<? endif; ?>