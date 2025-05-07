<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
?><?
	$headerBg = \Bitrix\Main\Config\Option::get("main", "HEADER_BACKGROUND", "white");
	$headerEnabled = \Bitrix\Main\Config\Option::get("main", "HEADER_ENABLE", "N");
	$headerPhone = \Bitrix\Main\Config\Option::get("main", "HEADER_PHONE", "");
	$footerEnabled = \Bitrix\Main\Config\Option::get("main", "FOOTER_ENABLE", "N");
	$footerEmail = \Bitrix\Main\Config\Option::get("main", "FOOTER_EMAIL", "");
	$footerSocial = \Bitrix\Main\Config\Option::get("main", "FOOTER_SOCIAL", "");
	$productShowPrice = \Bitrix\Main\Config\Option::get("main", "PRODUCT_SHOW_PRICE", "Y");
	$productShowButton = \Bitrix\Main\Config\Option::get("main", "PRODUCT_SHOW_BUTTON", "N");

	echo '<pre>$headerEnabled</pre>';
	echo $headerEnabled;
	echo '<pre>$headerBg</pre>';
	echo $headerBg;
	echo '<pre>$headerPhone</pre>';
	echo $headerPhone;
	echo '<pre>$footerEnabled</pre>';
	echo $footerEnabled;
	echo '<pre>$footerEmail</pre>';
	echo $footerEmail;
	echo '<pre>$footerSocial</pre>';
	echo $footerSocial;
	echo '<pre>$productShowPrice</pre>';
	echo $productShowPrice;
	echo '<pre>$productShowButton</pre>';
	echo $productShowButton;
	?>
<p>
	Наша компания существует на Российском рынке с 2025 года. За это время «Мебельная компания» прошла большой путь от маленькой торговой фирмы до одного из крупнейших производителей корпусной мебели в России.
</p>
<p>
	«Мебельная компания» осуществляет производство мебели на высококлассном оборудовании с применением минимальной доли ручного труда, что позволяет обеспечить высокое качество нашей продукции. Налажен производственный процесс как массового и индивидуального характера, что с одной стороны позволяет обеспечить постоянную номенклатуру изделий и индивидуальный подход – с другой.
</p>
<h3>Наша продукция</h3>
<? $APPLICATION->IncludeComponent(
	"bitrix:furniture.catalog.index",
	"",
	array(
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"IBLOCK_BINDING" => "section",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "products"
	)
); ?>
<h3>Наши услуги</h3>
<? $APPLICATION->IncludeComponent(
	"bitrix:furniture.catalog.index",
	"",
	array(
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"IBLOCK_BINDING" => "element",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "products"
	)
); ?>
<p>
</p><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>