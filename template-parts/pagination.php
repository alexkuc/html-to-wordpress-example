<?php

function is_paged_last(): bool
{
  global $wp_query;
  $total = (int) $wp_query->max_num_pages;
  $current = (int) $wp_query->query['paged'];
  // first condition is for last paginated page
  // second condition is for pagination limit greater than
  // no. of posts retrieved
  if ($total == $current || $total > $current) {
    return true;
  }
  return false;
}

?>

<!-- Pager -->
<div class="clearfix">
  <?php if (is_paged()) : ?>
    <a class="btn btn-primary float-left" href="<?php previous_posts() ?>"> &larr; Back</a>
  <?php endif ?>
  <?php if (!is_paged_last()) : ?>
    <a class="btn btn-primary float-right" href="<?php next_posts() ?>">Next &rarr;</a>
  <?php endif ?>
</div>
