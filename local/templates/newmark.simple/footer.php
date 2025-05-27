<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

</main>
<footer>
  <p>footer</p>
</footer>
<? include_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/includes/cookie/template.php");  ?>
<script>
  window.themeSettings = <?= $jsThemeSettings ?>;
</script>
</body>

</html>