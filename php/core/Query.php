<?php

namespace CleanBlog\Core;

class Query
{
  public function __construct()
  {
    add_action('pre_get_posts', [$this, 'preFilter']);
  }

  public function preFilter($query): void
  {
    if (!$query->is_home()) {
      return;
    }
    $query->set('posts_per_page', 5);
  }
}
