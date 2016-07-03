<?php


class DesignByCode_Contact_Widget extends WP_Widget {

  public function __construct(){
    parent::__construct(
      'DesignByCode_contact_details',
      'Design by Code: Contact Details',
      array('Description' => __('Display contact details', NAME))
    );
  }
  

  public function form($instance){
    $defaults = array(
      'title' => __('Contact Details', NAME),
      'name' => __('Name', NAME),
      'email' => __('claude@designbycode.co.za', NAME),
      'phone' => __('061 924 8374', NAME)
    );

     $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
     <!-- the title -->
      <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', NAME); ?></label>
        <input type="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?> " class="widefat">

      </p>
     <!-- the Name -->
      <p>
        <label for=" <?php echo $this->get_field_id('name'); ?> "> <?php _e('Name', NAME); ?> </label>
        <input type="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" value="<?php echo esc_attr($instance['name']); ?> " class="widefat">

      </p>

     <!-- the email -->
      <p>
        <label for="<?php echo $this->get_field_id('email'); ?> "> <?php _e('Email Address', NAME); ?> </label>
        <input type="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo esc_attr($instance['email']); ?> " class="widefat">

      </p>

     <!-- the Phone -->
      <p>
        <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Pone Number', NAME); ?> </label>
        <input type="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo esc_attr($instance['phone']); ?> " class="widefat">

      </p>


    <?php

  }// .end of form

  public function update($new_instance, $old_instance){
    $instance = $old_instance;

    //title
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['name'] = strip_tags($new_instance['name']);
    $instance['email'] = strip_tags($new_instance['email']);
    $instance['phone'] = strip_tags($new_instance['phone']);

    return $instance;
  } // .end of update

  public function widget($args, $instance){
    extract($args);
    $title = apply_filters( 'wigdet-title', $instance['title'] );

    $name = $instance['name'];
    $email = $instance['email'];
    $phone = $instance['phone'];


    echo $before_widget;

    if($title){
      echo $before_title . $title . $after_title;
    }

    echo '<ul class="design-by-code--contact-widget md-col-6">'; ?>



    <?php if($name): ?>
      <li class="contact-info-name-widget">
      <?php echo $name; ?>
      </li>

    <?php endif; ?>

    <?php if($phone): ?>
      <li>
        <?php echo $phone; ?>
      </li>
    <?php endif; ?>

    <?php if($email): ?>
      <li>
        <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
      </li>
    <?php endif; ?>



    <?php echo '</ul>';

    echo $after_widget;

  } //.end of widget




}




register_widget( 'DesignByCode_Contact_Widget' );
