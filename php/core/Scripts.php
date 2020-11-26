<?php

namespace CleanBlog\Core;

class Scripts
{
  public function __construct()
  {
    add_action('wp_enqueue_scripts', array($this, 'addStyles'));
    add_action('wp_enqueue_scripts', array($this, 'addScripts'));
  }

  public function addStyles()
  {
    wp_register_style(
      'clean-blog',
      URI . '/css/clean-blog.css',
    );
    wp_enqueue_style('clean-blog');

    wp_register_style(
      'fontawesome-free',
      URI . '/vendor/fontawesome-free/css/all.min.css'
    );
    wp_enqueue_style('fontawesome-free');

    wp_register_style(
      'lora',
      'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic'
    );
    wp_enqueue_style('lora');

    wp_register_style(
      'open-sans',
      'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic'
    );
    wp_enqueue_style('open-sans');

    wp_register_style(
      'bootstrap',
      URI . '/vendor/bootstrap/css/bootstrap.min.css'
    );
    wp_enqueue_style('bootstrap');
  }

  public function addScripts()
  {
    wp_register_script(
      'bootstrap',
      URI . '/vendor/bootstrap/js/bootstrap.bundle.min.js',
      [
        'jquery'
      ],
      null,
      true
    );
    wp_enqueue_script('bootstrap');

    wp_register_script(
      'clean-blog',
      URI . '/js/clean-blog.js',
      [
        'jquery',
        'bootstrap',
      ],
      null,
      true
    );
    wp_enqueue_script('clean-blog');

    wp_enqueue_script('jquery');
  }
}
