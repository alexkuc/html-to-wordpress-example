<?php

namespace CleanBlog\Core;

class Theme
{
  public function __construct()
  {
    add_action('after_setup_theme', [$this, 'settings']);
  }

  public function settings(): void
  {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
  }
}
