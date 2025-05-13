<?php
if (!defined('ABSPATH')) exit; // Prevent direct access

class Hi_Slider_Widget extends \Elementor\Widget_Base {
    public function get_name() { return 'hi_slider'; }
    public function get_title() { return __('Hi-Slider', 'hi-slider-for-elementor'); }
    public function get_icon() { return 'eicon-slider-album'; }
    public function get_categories() { return ['basic']; }

    protected function _register_controls() {
        // Slider Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Slider Content', 'hi-slider-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => __('Slides per View (Columns)', 'hi-slider-for-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 3,
            ]
        );

        $this->add_control(
            'content_position',
            [
                'label' => __('Content Position', 'hi-slider-for-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bottom-center',
                'options' => [
                    'top-left' => __('Top Left', 'hi-slider-for-elementor'),
                    'top-right' => __('Top Right', 'hi-slider-for-elementor'),
                    'bottom-left' => __('Bottom Left', 'hi-slider-for-elementor'),
                    'bottom-right' => __('Bottom Right', 'hi-slider-for-elementor'),
                    'middle-center' => __('Middle Center', 'hi-slider-for-elementor'),
                    'bottom-center' => __('Bottom Center', 'hi-slider-for-elementor'),
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __('Slides', 'hi-slider-for-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => __('Image', 'hi-slider-for-elementor'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => __('Title', 'hi-slider-for-elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Slide Title', 'hi-slider-for-elementor'),
                    ],
                    [
                        'name' => 'description',
                        'label' => __('Description', 'hi-slider-for-elementor'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __('Enter slide description here...', 'hi-slider-for-elementor'),
                    ],
                    [
                        'name' => 'button_text',
                        'label' => __('Button Text', 'hi-slider-for-elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Learn More', 'hi-slider-for-elementor'),
                    ],
                    [
                        'name' => 'button_link',
                        'label' => __('Button Link', 'hi-slider-for-elementor'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'default' => ['url' => '#'],
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Typography Controls
				$this->start_controls_section(
					'typography_section',
					[
						'label' => __('Typography', 'hi-slider-for-elementor'),
						'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					]
				);

				// Title Typography
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'title_typography',
						'label' => __('Title Typography', 'hi-slider-for-elementor'),
						'selector' => '{{WRAPPER}} .slide-content h5',
					]
				);

				// Title Color
				$this->add_control(
					'title_color',
					[
						'label' => __('Title Color', 'hi-slider-for-elementor'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .slide-content h5' => 'color: {{VALUE}} !important;',
						],
					]
				);

				// Content Typography
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'content_typography',
						'label' => __('Content Typography', 'hi-slider-for-elementor'),
						'selector' => '{{WRAPPER}} .slide-content p',
					]
				);

				// Content Color
				$this->add_control(
					'content_color',
					[
						'label' => __('Content Color', 'hi-slider-for-elementor'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .slide-content p' => 'color: {{VALUE}} !important;',
						],
					]
				);

				$this->end_controls_section();

   // Button Style Controls
$this->start_controls_section(
    'button_style_section',
    [
        'label' => __('Button Style', 'hi-slider-for-elementor'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

// Button Background Color
$this->add_control(
    'button_bg_color',
    [
        'label' => __('Background Color', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .slide-content .btn' => 'background-color: {{VALUE}};',
        ],
    ]
);

// Button Text Color
$this->add_control(
    'button_text_color',
    [
        'label' => __('Text Color', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .slide-content .btn' => 'color: {{VALUE}};',
        ],
    ]
);

// Button Background Hover Color
$this->add_control(
    'button_bg_hover_color',
    [
        'label' => __('Background Hover Color', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .slide-content .btn:hover' => 'background-color: {{VALUE}};',
        ],
    ]
);

// Button Text Hover Color
$this->add_control(
    'button_text_hover_color',
    [
        'label' => __('Text Hover Color', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .slide-content .btn:hover' => 'color: {{VALUE}};',
        ],
    ]
);

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'button_typography',
        'label' => __('Typography', 'hi-slider-for-elementor'),
        'selector' => '{{WRAPPER}} .slide-content .btn',
    ]
);

// Button Border Radius
$this->add_control(
    'button_border_radius',
    [
        'label' => __('Button Border Radius', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 50,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .slide-content .btn' => 'border-radius: {{SIZE}}{{UNIT}};',
        ],
    ]
);

// Box Shadow
$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'button_box_shadow',
        'label' => __('Button Box Shadow', 'hi-slider-for-elementor'),
        'selector' => '{{WRAPPER}} .slide-content .btn',
    ]
);

$this->end_controls_section();

  // Content Background & Text Align Controls
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content Box Style', 'hi-slider-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_bg_color',
            [
                'label' => __('Content Background Color', 'hi-slider-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'hi-slider-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_border_radius',
            [
                'label' => __('Content Border Radius', 'hi-slider-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .slide-content' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'text_alignment',
            [
                'label' => __('Text Alignment', 'hi-slider-for-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'hi-slider-for-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'hi-slider-for-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'hi-slider-for-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .slide-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

			// Box Shadow for Content
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_box_shadow',
                'label' => __('Content Box Shadow', 'hi-slider-for-elementor'),
                'selector' => '{{WRAPPER}} .slide-content',
            ]
        );

        $this->end_controls_section();
// Arrow (Pagination) Style Controls
$this->start_controls_section(
    'arrow_style_section',
    [
        'label' => __('Arrow Style', 'hi-slider-for-elementor'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

// Arrow Color
$this->add_control(
    'arrow_color',
    [
        'label' => __('Arrow Color', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .carousel-control-prev-icon, {{WRAPPER}} .carousel-control-next-icon' => 'background-color: {{VALUE}};',
        ],
    ]
);

// Arrow Hover Color
$this->add_control(
    'arrow_hover_color',
    [
        'label' => __('Arrow Hover Color', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .carousel-control-prev:hover .carousel-control-prev-icon, {{WRAPPER}} .carousel-control-next:hover .carousel-control-next-icon' => 'background-color: {{VALUE}};',
        ],
    ]
);

// Arrow Size
$this->add_control(
    'arrow_size',
    [
        'label' => __('Arrow Size', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .carousel-control-prev-icon, {{WRAPPER}} .carousel-control-next-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
        ],
    ]
);

// Arrow Border Radius (if you want them rounded)
$this->add_control(
    'arrow_border_radius',
    [
        'label' => __('Arrow Border Radius', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'selectors' => [
            '{{WRAPPER}} .carousel-control-prev-icon, {{WRAPPER}} .carousel-control-next-icon' => 'border-radius: {{SIZE}}{{UNIT}};',
        ],
    ]
);
// Arrow Padding
$this->add_responsive_control(
    'arrow_padding',
    [
        'label' => __('Arrow Padding', 'hi-slider-for-elementor'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => [
            '{{WRAPPER}} .carousel-control-prev, {{WRAPPER}} .carousel-control-next' => 
                'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        if (empty($settings['slides'])) return;

        $columns = $settings['columns'];
        $content_position = $settings['content_position'];
       $unique_id = 'hi-slider-' . wp_rand(1000, 9999);


        // Ensure we have enough slides to fill each row
        $slides = $settings['slides'];
        $slide_count = count($slides);

        // Calculate how many slides we need to complete each row
        $remainder = $slide_count % $columns;
        if ($remainder > 0) {
            $needed_clones = $columns - $remainder;
            for ($i = 0; $i < $needed_clones; $i++) {
                $slides[] = $slides[$i % $slide_count]; // Clone from the beginning
            }
        }

        // Now chunk the slides into groups based on the column setting
        $slides_chunks = array_chunk($slides, $columns);

        ?>
    <div id="<?php echo esc_attr($unique_id); ?>" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($slides_chunks as $index => $slide_group) : ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="container">
                        <div class="row justify-content-center">
                            <?php foreach ($slide_group as $slide) : ?>
                                <div class="col-md-<?php echo esc_attr(12 / $columns); ?>">
                                    <div class="slide-box">
                                        <?php echo wp_get_attachment_image( $slide['image']['id'], 'full', false, [ 'class' => 'd-block w-100' ] ); ?>
                                        <div class="slide-content <?php echo esc_attr($content_position); ?>">
                                            <h5><?php echo esc_html($slide['title']); ?></h5>
                                            <p><?php echo esc_html($slide['description']); ?></p>
                                            <a href="<?php echo esc_url($slide['button_link']['url']); ?>" class="btn btn-primary">
                                                <?php echo esc_html($slide['button_text']); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Cloned first slide group for smooth infinite loop -->
            <div class="carousel-item" id="cloned-slide">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php foreach ($slides_chunks[0] as $slide) : ?>
                            <div class="col-md-<?php echo esc_attr(12 / $columns); ?>">
                                <div class="slide-box">
                                    <?php echo wp_get_attachment_image( $slide['image']['id'], 'full', false, [ 'class' => 'd-block w-100' ] ); ?>
                                    <div class="slide-content <?php echo esc_attr($content_position); ?>">
                                        <h5><?php echo esc_html($slide['title']); ?></h5>
                                        <p><?php echo esc_html($slide['description']); ?></p>
                                        <a href="<?php echo esc_url($slide['button_link']['url']); ?>" class="btn btn-primary">
                                            <?php echo esc_html($slide['button_text']); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo esc_attr($unique_id); ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#<?php echo esc_attr($unique_id); ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let slider = document.getElementById("<?php echo esc_js($unique_id); ?>");
                let items = slider.querySelectorAll(".carousel-item");
                let totalSlides = items.length;

                slider.addEventListener("slid.bs.carousel", function (event) {
                    if (event.to === totalSlides - 1) { // Last slide (cloned one)
                        setTimeout(function () {
                            let activeItem = slider.querySelector(".carousel-item.active");
                            activeItem.classList.remove("active");
                            items[0].classList.add("active"); // Move instantly to first slide
                            slider.querySelector(".carousel-inner").style.transform = "translateX(0%)";
                        }, 50);
                    }
                });
            });
        </script>

        <?php
    }
}
