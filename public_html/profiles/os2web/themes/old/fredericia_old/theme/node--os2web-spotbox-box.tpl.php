<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="caption">
  <?php
    $spotbox_display_links = FALSE;
    if ($node && $spotbox_display = field_get_items('node', $node, 'field_os2web_spotbox_display')) {
      if ($spotbox_display[0]['value']) {
        $spotbox_display_links = TRUE;
      }
    }
  ?>
  <?php if (!$spotbox_display_links) : ?>
    <?php $spotbox_url = (isset($variables['elements']['#spotbox_url'])) ? $variables['elements']['#spotbox_url'] : $spotbox_url; ?>
    <?php if(!empty($spotbox_url)) : ?>
      <a href="<?php print $spotbox_url ?>">
    <?php endif; ?>
    <?php if(!empty($content['field_os2web_spotbox_big_image'])) : ?>
      <?php print render($content['field_os2web_spotbox_big_image']); ?>
    <?php endif; ?>
    <?php print render($content['field_os2web_spotbox_video']); ?>

    <?php if(!empty($content['field_os2web_spotbox_text'])) : ?>
    <div class="item-text">
      <div class="bubble">
        <span>
          <h3><?php print render($content['field_os2web_spotbox_text']); ?></h3>
        </span>

      </div>
    </div>
    <?php endif; ?>

    <?php if(!empty($spotbox_url)) : ?>
      </a>
    <?php endif; ?>
  <?php else: ?>
    <div class="spotbox_display_links">
      <?php print render($content['field_os2web_base_field_ext_link']); ?>
    </div>
  <?php endif; ?>
  </div>

</div> <!-- /.node -->
