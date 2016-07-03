<?php

//namespace Crystalbars\WP\Classes;

 //support types = 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields'),'taxonomies'


class CustomPostType
{
  protected $textdomain;
  protected $post;

  public function __construct($textdomain)
  {
    $this->textdomain = $textdomain;
    $this->post = array();
    add_action('init', array(&$this, 'register_post_type'));
  }

  public function register_post_type()
  {
    foreach($this->post as $key=>$value)
    {
      register_post_type($key , $value);
    }
  }

  public function make($type, $singular_label, $plural_label, $settings = array())
  {
    $default_settings = array(
      'labels' => array(
        'name' => __($plural_label, $this->textdomain),
        'singular_name' => __('All' .$singular_label, $this->textdomain),
        'add_new_item' => __('Add New ' . $singular_label, $this->textdomain),
        'edit_item' => __('Edit ' . $singular_label, $this->textdomain),
        'new_item' => __('New ' . $singular_label, $this->textdomain),
        'search_items' => __('Search '. $plural_label, $this->textdomain),
        'not_found' => __('NO ' . $plural_label . ' found', $this->textdomain),
        'not_found_in_trash' => __('No ' . $plural_label . ' found in trash', $this->textdomain),
        'parent_item_colon' => __('Parent ' . $singular_label, $this->textdomain)
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical'=> true,
      'menu_position' => 20,
      'rewrite' => true,
      'show_in_nav_menu' => true,
      'show_in_menu' => true,
      'publicly_queryable' => true,
      'capability_type' => 'page',
      'taxonomies' => array(),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
        'excerpt',
        'trackback',
        'custom-fields',
        'page-attributes',
        'post-formats',
        'author',
        'comments',


      ),
      'rewrite' => array(
        'slug' => sanitize_title_with_dashes( $plural_label )
      )
    );

    $this->post[$type] = array_merge($default_settings, $settings);

  }
}
