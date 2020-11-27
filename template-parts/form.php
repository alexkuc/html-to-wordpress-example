<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form action="<?php the_permalink() ?>" style="text-align: center;">
          Add New Entry: <input type="text" name="data">
          <?php wp_nonce_field('add_data', 'custom_form_nonce') ?>
          <input type="submit">
        </form>
      </div>
    </div>
  </div>
</article>
<hr>


<?php

if (!wp_verify_nonce($_REQUEST['custom_form_nonce'], 'add_data')) {
  return;
}

$data = get_option(get_option('stylesheet'), []);

$data[] = sanitize_text_field($_REQUEST['data']);

update_option(get_option('stylesheet'), $data);
