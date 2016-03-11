<?php if ($page['navigation']): ?>
  <?php print render($page['navigation']); ?>
<?php endif; ?>

<div class='front-main-container-wrapper container'>
  <div class='main-container container'>
    <?php print render($page['header']); ?>
</div>

<?php print render($page['content']); ?>
<?php print render($page['footer']); ?>
