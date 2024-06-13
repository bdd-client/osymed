<?php

namespace Elementor;

class Section_Contact_Us extends Widget_Base {
  public function get_name()
    {
        return 'Section_Contact_Us';
    }

    public function get_title()
    {
        return 'Section Contact Us';
    }

    public function get_icon()
    {
        return 'eicon-photo-library';
    }
    
    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls()
    {
      // content section
      $this->start_controls_section(
        'section_title',
        [
            'label' => __('Content', 'elementor'),
        ]
      );

      $this->add_control(
        'title',
        [
          'label' => esc_html__( 'Title', 'elementor' ),
          'type' => \Elementor\Controls_Manager::TEXTAREA,
          'default' => esc_html__( 'Default Title', 'elementor' ),
          'placeholder' => esc_html__( 'Type your title here', 'elementor' ),
        ]
      );

      $this->add_control(
        'description',
        [
          'label' => esc_html__( 'Description', 'elementor' ),
          'type' => \Elementor\Controls_Manager::WYSIWYG,
          'default' => esc_html__( 'Default Description', 'elementor' ),
          'placeholder' => esc_html__( 'Type your description here', 'elementor' ),
        ]
      );

      $this->add_control(
        'image',
        [
          'label' => esc_html__( 'Choose Image', 'elementor' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->end_controls_section();

    }
    
    protected function render()
    {
      $settings = $this->get_settings_for_display();
      ?>
      <div class="row">
        <?php if ( $settings['image']['url'] != '' ) { ?>
        <div class="col-md-6 col-lg-6 col-12 left-content">
          <img src="<?= $settings['image']['url']; ?>">
        </div>
        <?php } ?>
        <div class="<?php if ( $settings['image']['url'] != '' ) { ?>col-md-6 col-lg-6 col-12 right-content<?php } else { ?>col-12<?php } ?>">
          <header class="contact-us-title">
            <h1><?= $settings['title']; ?></h1>
          </header>
          <div class="contact-content">
            <div class="contact-desc">
              <div class="rte">
                <?= $settings['description']; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
}