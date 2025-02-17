<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_addons_for_elementor_add_button_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_button_shortcode( $shortcodes ) {
		$shortcodes[] = 'QiAddonsForElementor_Button_Shortcode';

		return $shortcodes;
	}

	add_filter( 'qi_addons_for_elementor_filter_register_shortcodes', 'qi_addons_for_elementor_add_button_shortcode', 9 );
}

if ( class_exists( 'QiAddonsForElementor_Shortcode' ) ) {
	class QiAddonsForElementor_Button_Shortcode extends QiAddonsForElementor_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( QI_ADDONS_FOR_ELEMENTOR_SHORTCODES_URL_PATH . '/button' );
			$this->set_base( 'qi_addons_for_elementor_button' );
			$this->set_name( esc_html__( 'Button', 'qi-addons-for-elementor' ) );
			$this->set_description( esc_html__( 'Shortcode that displays button with provided parameters', 'qi-addons-for-elementor' ) );
			$this->set_category( esc_html__( 'Qi Addons For Elementor', 'qi-addons-for-elementor' ) );
			$this->set_subcategory( esc_html__( 'Typography', 'qi-addons-for-elementor' ) );
			$this->set_demo( 'https://qodeinteractive.com/qi-addons-for-elementor/button/' );
			$this->set_documentation( 'https://qodeinteractive.com/qi-addons-for-elementor/documentation/#button' );
			$this->set_video( 'https://www.youtube.com/watch?v=BW9kZV40eZY' );
			$this->set_necessary_styles( qi_addons_for_elementor_icon_necessary_styles() );

			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'button_layout',
					'title'         => esc_html__( 'Layout', 'qi-addons-for-elementor' ),
					'options'       => array(
						'filled'   => esc_html__( 'Filled', 'qi-addons-for-elementor' ),
						'outlined' => esc_html__( 'Outlined', 'qi-addons-for-elementor' ),
						'textual'  => esc_html__( 'Textual', 'qi-addons-for-elementor' ),
					),
					'default_value' => 'filled',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'button_type',
					'title'         => esc_html__( 'Type', 'qi-addons-for-elementor' ),
					'options'       => array(
						'standard'     => esc_html__( 'Standard', 'qi-addons-for-elementor' ),
						'inner-border' => esc_html__( 'With Inner Border', 'qi-addons-for-elementor' ),
						'icon-boxed'   => esc_html__( 'Icon Boxed', 'qi-addons-for-elementor' ),
					),
					'default_value' => 'standard',
					'dependency'    => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'button_underline',
					'title'         => esc_html__( 'Enable Button Text Underline', 'qi-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'button_size',
					'title'      => esc_html__( 'Size', 'qi-addons-for-elementor' ),
					'options'    => array(
						''      => esc_html__( 'Normal', 'qi-addons-for-elementor' ),
						'small' => esc_html__( 'Small', 'qi-addons-for-elementor' ),
						'large' => esc_html__( 'Large', 'qi-addons-for-elementor' ),
						'full'  => esc_html__( 'Normal Full Width', 'qi-addons-for-elementor' ),
					),
					'dependency' => array(
						'hide' => array(
							'button_layout' => array(
								'values'        => 'textual',
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'button_text',
					'title'         => esc_html__( 'Button Text', 'qi-addons-for-elementor' ),
					'default_value' => esc_html__( 'Click Here', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'link',
					'name'       => 'button_link',
					'title'      => esc_html__( 'Button Link', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'typography',
					'name'       => 'button_typography',
					'title'      => esc_html__( 'Typography', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-qi-button',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'start_controls_tabs',
					'name'       => 'button_style_tabs',
					'title'      => esc_html__( 'Tabs Start', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'start_controls_tab',
					'name'       => 'button_tab_normal',
					'title'      => esc_html__( 'Normal', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_color',
					'title'      => esc_html__( 'Text Color', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button' => 'color: {{VALUE}};',
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_background_color',
					'title'      => esc_html__( 'Background Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button.qodef-layout--filled' => 'background-color: {{VALUE}};',
					),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => 'filled',
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_border_color',
					'title'      => esc_html__( 'Border Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button' => 'border-color: {{VALUE}};',
					),
					'dependency' => array(
						'hide' => array(
							'button_layout' => array(
								'values'        => 'textual',
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'end_controls_tab',
					'name'       => 'button_tab_normal_end',
					'title'      => esc_html__( 'Normal End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'start_controls_tab',
					'name'       => 'button_tab_hover',
					'title'      => esc_html__( 'Hover', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_hover_color',
					'title'      => esc_html__( 'Text Hover Color', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button:hover' => 'color: {{VALUE}};',
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_hover_background_color',
					'title'      => esc_html__( 'Background Hover Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button.qodef-layout--filled:not(.qodef-hover--reveal):hover'   => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .qodef-qi-button.qodef-layout--outlined:not(.qodef-hover--reveal):hover' => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .qodef-qi-button.qodef-layout--filled.qodef-hover--reveal:after'   => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .qodef-qi-button.qodef-layout--outlined.qodef-hover--reveal:after' => 'background-color: {{VALUE}};',
					),
					'dependency' => array(
						'hide' => array(
							'button_layout' => array(
								'values'        => 'textual',
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_hover_border_color',
					'title'      => esc_html__( 'Border Hover Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button:hover' => 'border-color: {{VALUE}};',
					),
					'dependency' => array(
						'hide' => array(
							'button_layout' => array(
								'values'        => 'textual',
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'button_reveal_hover',
					'title'      => esc_html__( 'Reveal Background', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
					'options'    => array(
						''                  => esc_html__( 'None', 'qi-addons-for-elementor' ),
						'reveal-horizontal' => esc_html__( 'Horizontal', 'qi-addons-for-elementor' ),
						'reveal-vertical'   => esc_html__( 'Vertical', 'qi-addons-for-elementor' ),
					),
					'dependency' => array(
						'hide' => array(
							'button_layout' => array(
								'values'        => 'textual',
								'default_value' => 'filled',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'end_controls_tab',
					'name'       => 'button_tab_hover_end',
					'title'      => esc_html__( 'Hover End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'end_controls_tabs',
					'name'       => 'button_style_tabs_end',
					'title'      => esc_html__( 'Tabs End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'divider',
					'name'       => 'item_divider_button_tab_style',
					'title'      => esc_html__( 'Divider', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'dimensions',
					'name'       => 'button_border_width',
					'title'      => esc_html__( 'Border Width', 'qi-addons-for-elementor' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button' => 'border-width: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
					),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'dimensions',
					'name'       => 'button_border_radius',
					'title'      => esc_html__( 'Border Radius', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px', '%' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'dimensions',
					'name'       => 'button_padding',
					'title'      => esc_html__( 'Padding', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px', '%', 'em' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .qodef-qi-button.qodef-type--icon-boxed .qodef-m-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .qodef-qi-button.qodef-type--icon-boxed .qodef-m-icon' => 'padding: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}};',
					),
					'dependency' => array(
						'show' => array(
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Style', 'qi-addons-for-elementor' ),
				)
			);

			// Icon options.
			$this->set_option(
				array(
					'field_type'    => 'icons',
					'name'          => 'button_icon',
					'title'         => esc_html__( 'Icon', 'qi-addons-for-elementor' ),
					'default_value' => array(),
					'group'         => esc_html__( 'Icon', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'button_icon_position',
					'title'         => esc_html__( 'Icon Position', 'qi-addons-for-elementor' ),
					'options'       => array(
						'left'  => esc_html__( 'Left', 'qi-addons-for-elementor' ),
						'right' => esc_html__( 'Right', 'qi-addons-for-elementor' ),
					),
					'default_value' => 'right',
					'group'         => esc_html__( 'Icon', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_icon_size',
					'title'      => esc_html__( 'Icon Size', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px', 'em', 'rem', 'vw' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-icon'     => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .qodef-m-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'start_controls_tabs',
					'name'       => 'button_icon_style_tabs',
					'title'      => esc_html__( 'Tabs Start', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'start_controls_tab',
					'name'       => 'button_icon_tab_normal',
					'title'      => esc_html__( 'Normal', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_icon_color',
					'title'      => esc_html__( 'Icon Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-icon' => 'color: {{VALUE}};',
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			// Icon Background Options (only for icon boxed, when filled and outline layout is chosen).
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_icon_background_color',
					'title'      => esc_html__( 'Icon Background Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button.qodef-type--icon-boxed .qodef-m-icon' => 'background-color: {{VALUE}};',
					),
					'dependency' => array(
						'relation' => 'and',
						'show'     => array(
							'button_type'   => array(
								'values'        => 'icon-boxed',
								'default_value' => 'standard',
							),
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'end_controls_tab',
					'name'       => 'button_tab_icon_normal_end',
					'title'      => esc_html__( 'Normal End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'start_controls_tab',
					'name'       => 'button_icon_tab_hover',
					'title'      => esc_html__( 'Hover', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_icon_hover_color',
					'title'      => esc_html__( 'Icon Hover Color', 'qi-addons-for-elementor' ),
					'dependency' => array(
						'hide' => array(
							'button_icon_color' => array(
								'values'        => '',
								'default_value' => '',
							),
						),
					),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button:hover .qodef-m-icon' => 'color: {{VALUE}};',
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_icon_background_hover_color',
					'title'      => esc_html__( 'Icon Background Hover Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button.qodef-type--icon-boxed:not(.qodef-icon-background-hover--reveal):hover .qodef-m-icon'   => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .qodef-qi-button.qodef-type--icon-boxed.qodef-icon-background-hover--reveal .qodef-m-icon:after'   => 'background-color: {{VALUE}};',
					),
					'dependency' => array(
						'relation' => 'and',
						'show'     => array(
							'button_type'   => array(
								'values'        => 'icon-boxed',
								'default_value' => 'standard',
							),
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'button_icon_background_hover_reveal',
					'title'      => esc_html__( 'Reveal Background', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
					'options'    => array(
						''                  => esc_html__( 'None', 'qi-addons-for-elementor' ),
						'reveal-horizontal' => esc_html__( 'Horizontal', 'qi-addons-for-elementor' ),
						'reveal-vertical'   => esc_html__( 'Vertical', 'qi-addons-for-elementor' ),
					),
					'dependency' => array(
						'hide' => array(
							'button_icon_background_hover_color' => array(
								'values'        => '',
								'default_value' => '',
							),
						),
					),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'button_icon_hover_move',
					'title'      => esc_html__( 'Move Icon', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
					'options'    => array(
						'move-horizontal-short' => esc_html__( 'Horizontal Short', 'qi-addons-for-elementor' ),
						'move-horizontal'       => esc_html__( 'Horizontal', 'qi-addons-for-elementor' ),
						'move-vertical'         => esc_html__( 'Vertical', 'qi-addons-for-elementor' ),
						'move-diagonal'         => esc_html__( 'Diagonal', 'qi-addons-for-elementor' ),
						''                      => esc_html__( 'None', 'qi-addons-for-elementor' ),
					),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'end_controls_tab',
					'name'       => 'button_icon_tab_hover_end',
					'title'      => esc_html__( 'Hover End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'end_controls_tabs',
					'name'       => 'button_icon_style_tabs_end',
					'title'      => esc_html__( 'Tabs End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'divider',
					'name'       => 'button_icon_margin_divider',
					'title'      => esc_html__( 'Icon Divider', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'dimensions',
					'name'       => 'button_icon_margin',
					'title'      => esc_html__( 'Icon Margin', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px', '%', 'em' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'divider',
					'name'       => 'button_icon_border_divider',
					'title'      => esc_html__( 'Icon Divider', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);
			// Icon Side Border Options (only for icon boxed, when filled and outline layout is chosen).
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'button_icon_enable_side_border',
					'title'         => esc_html__( 'Enable Icon Side Border', 'qi-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'dependency'    => array(
						'relation' => 'and',
						'show'     => array(
							'button_type'   => array(
								'values'        => 'icon-boxed',
								'default_value' => 'standard',
							),
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'         => esc_html__( 'Icon', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_icon_side_color',
					'title'      => esc_html__( 'Icon Side Border Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-border' => 'background-color: {{VALUE}};',
					),
					'dependency' => array(
						'show' => array(
							'button_icon_enable_side_border' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_icon_side_hover_color',
					'title'      => esc_html__( 'Icon Side Border Hover Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button.qodef-type--icon-boxed:hover .qodef-m-border' => 'background-color: {{VALUE}};',
					),
					'dependency' => array(
						'show' => array(
							'button_icon_enable_side_border' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_icon_side_height',
					'title'      => esc_html__( 'Icon Side Border Height', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-border' => 'height: {{SIZE}}{{UNIT}}; align-self: center;',
					),
					'dependency' => array(
						'show' => array(
							'button_icon_enable_side_border' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_icon_side_width',
					'title'      => esc_html__( 'Icon Side Border Width', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px' ),
					'responsive' => true,
					'range'      => array(
						'px' => array(
							'min' => 0,
							'max' => 10,
						),
					),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-border' => 'width: {{SIZE}}{{UNIT}};',
					),
					'dependency' => array(
						'show' => array(
							'button_icon_enable_side_border' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Icon Style', 'qi-addons-for-elementor' ),
				)
			);

			// Button Inner Border Options (only for inner border type, when filled and outline layout is chosen).
			$this->set_option(
				array(
					'field_type' => 'start_controls_tabs',
					'name'       => 'button_inner_border_style_tabs',
					'title'      => esc_html__( 'Inner Border Start', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'start_controls_tab',
					'name'       => 'button_inner_border_normal',
					'title'      => esc_html__( 'Normal', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_inner_border_color',
					'title'      => esc_html__( 'Inner Border Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-inner-border' => 'color: {{VALUE}};',
					),
					'dependency' => array(
						'relation' => 'and',
						'show'     => array(
							'button_type'   => array(
								'values'        => 'inner-border',
								'default_value' => 'standard',
							),
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'end_controls_tab',
					'name'       => 'button_inner_border_normal_end',
					'title'      => esc_html__( 'Normal End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'start_controls_tab',
					'name'       => 'button_inner_border_hover',
					'title'      => esc_html__( 'Hover', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_inner_border_hover_color',
					'title'      => esc_html__( 'Inner Border Hover Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button.qodef-type--inner-border:not(.qodef-inner-border-hover--draw):hover .qodef-m-inner-border:not(.qodef-m-inner-border-copy)' => 'color: {{VALUE}};',
						'{{WRAPPER}} .qodef-qi-button.qodef-type--inner-border .qodef-m-inner-border.qodef-m-inner-border-copy' => 'color: {{VALUE}};',
					),
					'dependency' => array(
						'relation' => 'and',
						'show'     => array(
							'button_type'   => array(
								'values'        => 'inner-border',
								'default_value' => 'standard',
							),
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'button_inner_border_hover_type',
					'title'      => esc_html__( 'Hover', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
					'options'    => array(
						''                           => esc_html__( 'Change Color', 'qi-addons-for-elementor' ),
						'draw q-draw-center'         => esc_html__( 'Draw From Center', 'qi-addons-for-elementor' ),
						'draw q-draw-one-point'      => esc_html__( 'Draw From One Point', 'qi-addons-for-elementor' ),
						'draw q-draw-two-points'     => esc_html__( 'Draw From Two Points', 'qi-addons-for-elementor' ),
						'remove q-remove-center'     => esc_html__( 'Remove To Center', 'qi-addons-for-elementor' ),
						'remove q-remove-one-point'  => esc_html__( 'Remove To One Point', 'qi-addons-for-elementor' ),
						'remove q-remove-two-points' => esc_html__( 'Remove To Two Points', 'qi-addons-for-elementor' ),
						'move-outer-edge'            => esc_html__( 'Move To Outer Edge', 'qi-addons-for-elementor' ),
					),
					'dependency' => array(
						'relation' => 'and',
						'show'     => array(
							'button_type'   => array(
								'values'        => 'inner-border',
								'default_value' => 'standard',
							),
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'end_controls_tab',
					'name'       => 'button_inner_border_hover_end',
					'title'      => esc_html__( 'Hover End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'end_controls_tabs',
					'name'       => 'button_inner_border_style_tabs_end',
					'title'      => esc_html__( 'Inner Border End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'divider',
					'name'       => 'button_inner_border_divider',
					'title'      => esc_html__( 'Inner Border Divider', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_inner_border_offset',
					'title'      => esc_html__( 'Inner Border Offset', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px', '%' ),
					'responsive' => true,
					'range'      => array(
						'px' => array(
							'min' => 1,
							'max' => 30,
						),
					),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-inner-border' => 'font-size: {{SIZE}}{{UNIT}};',
					),
					'dependency' => array(
						'relation' => 'and',
						'show'     => array(
							'button_type'   => array(
								'values'        => 'inner-border',
								'default_value' => 'standard',
							),
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_inner_border_width',
					'title'      => esc_html__( 'Inner Border Width', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px' ),
					'responsive' => true,
					'range'      => array(
						'px' => array(
							'min' => 1,
							'max' => 10,
						),
					),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-border-top'  => 'height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .qodef-m-border-right' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .qodef-m-border-bottom' => 'height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .qodef-m-border-left' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .qodef-inner-border-hover--move-outer-edge .qodef-m-inner-border' => 'border-width: {{SIZE}}{{UNIT}};',
					),
					'dependency' => array(
						'relation' => 'and',
						'show'     => array(
							'button_type'   => array(
								'values'        => 'inner-border',
								'default_value' => 'standard',
							),
							'button_layout' => array(
								'values'        => array( 'filled', 'outlined' ),
								'default_value' => 'filled',
							),
						),
					),
					'group'      => esc_html__( 'Inner Border Style', 'qi-addons-for-elementor' ),
				)
			);

			// Button Underline Options.
			$this->set_option(
				array(
					'field_type' => 'start_controls_tabs',
					'name'       => 'button_underline_style_tabs',
					'title'      => esc_html__( 'Tabs Start', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'start_controls_tab',
					'name'       => 'button_underline_tab_normal',
					'title'      => esc_html__( 'Normal', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_underline_color',
					'title'      => esc_html__( 'Underline Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-text:after' => 'background-color: {{VALUE}};',
					),
					'dependency' => array(
						'show' => array(
							'button_underline' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_underline_width',
					'title'      => esc_html__( 'Underline Width', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px', '%' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-text:after' => 'width: {{SIZE}}{{UNIT}};',
					),
					'dependency' => array(
						'show' => array(
							'button_underline' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'end_controls_tab',
					'name'       => 'button_underline_tab_normal_end',
					'title'      => esc_html__( 'Normal End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'start_controls_tab',
					'name'       => 'button_underline_tab_hover',
					'title'      => esc_html__( 'Hover', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'button_underline_hover_color',
					'title'      => esc_html__( 'Underline Hover Color', 'qi-addons-for-elementor' ),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button.qodef-text-underline:hover .qodef-m-text:after' => 'background-color: {{VALUE}};',
					),
					'dependency' => array(
						'show' => array(
							'button_underline' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_underline_hover_width',
					'title'      => esc_html__( 'Underline Hover Width', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px', '%' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-qi-button.qodef-text-underline:hover .qodef-m-text:after' => 'width: {{SIZE}}{{UNIT}};',
					),
					'dependency' => array(
						'relation' => 'and',
						'hide'     => array(
							'button_underline_draw' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
							'button_underline'      => array(
								'values'        => 'no',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'button_underline_draw',
					'title'         => esc_html__( 'Enable Hover Underline Draw', 'qi-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes' ),
					'default_value' => 'no',
					'dependency'    => array(
						'show' => array(
							'button_underline_alignment' => array(
								'values'        => array( 'left', 'right' ),
								'default_value' => 'left',
							),
						),
					),
					'group'         => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'end_controls_tab',
					'name'       => 'button_underline_tab_hover_end',
					'title'      => esc_html__( 'Hover End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'end_controls_tabs',
					'name'       => 'button_underline_style_tabs_end',
					'title'      => esc_html__( 'Underline End', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'divider',
					'name'       => 'item_divider_button_tab_underline_style',
					'title'      => esc_html__( 'Divider', 'qi-addons-for-elementor' ),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_underline_offset',
					'title'      => esc_html__( 'Underline Offset', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px' ),
					'responsive' => true,
					'range'      => array(
						'px' => array(
							'min' => -20,
							'max' => 20,
						),
					),
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-text:after' => 'bottom: {{SIZE}}{{UNIT}};',
					),
					'dependency' => array(
						'show' => array(
							'button_underline' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'slider',
					'name'       => 'button_underline_thickness',
					'title'      => esc_html__( 'Underline Thickness', 'qi-addons-for-elementor' ),
					'size_units' => array( 'px', '%' ),
					'responsive' => true,
					'selectors'  => array(
						'{{WRAPPER}} .qodef-m-text:after' => 'height: {{SIZE}}{{UNIT}};',
					),
					'dependency' => array(
						'show' => array(
							'button_underline' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'button_underline_alignment',
					'title'      => esc_html__( 'Underline Alignment', 'qi-addons-for-elementor' ),
					'options'    => array(
						'left'   => esc_html__( 'Left', 'qi-addons-for-elementor' ),
						'right'  => esc_html__( 'Right', 'qi-addons-for-elementor' ),
						'center' => esc_html__( 'Center', 'qi-addons-for-elementor' ),
					),
					'dependency' => array(
						'show' => array(
							'button_underline' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
					'group'      => esc_html__( 'Underline Style', 'qi-addons-for-elementor' ),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'array',
					'name'       => 'custom_attrs',
					'title'      => esc_html__( 'Custom Data Attributes', 'qi-addons-for-elementor' ),
					'visibility' => array(
						'map_for_page_builder' => false,
					),
				)
			);
		}

		public function load_assets() {
			parent::load_assets();

			qi_addons_for_elementor_icon_load_assets();
		}

		public static function call_shortcode( $params ) {
			$html = qi_addons_for_elementor_framework_call_shortcode( 'qi_addons_for_elementor_button', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {

			parent::render( $options );
			$atts = $this->get_atts();

			$atts['type']           = $this->get_button_type( $atts );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['data_attrs']     = $this->get_data_attrs( $atts );
			$atts['icon_classes']   = $this->get_icon_classes( $atts );

			return qi_addons_for_elementor_get_template_part( 'shortcodes/button', 'variations/' . $atts['type'] . '/templates/button', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-qi-button';
			$holder_classes[] = 'qodef-html--link';
			$holder_classes[] = ! empty( $atts['button_layout'] ) ? 'qodef-layout--' . $atts['button_layout'] : '';
			$holder_classes[] = ! empty( $atts['button_type'] ) ? 'qodef-type--' . $atts['button_type'] : '';
			$holder_classes[] = ! empty( $atts['button_size'] ) ? 'qodef-size--' . $atts['button_size'] : '';
			$holder_classes[] = ! empty( $atts['button_reveal_hover'] ) ? 'qodef-hover--reveal qodef--' . $atts['button_reveal_hover'] : '';
			$holder_classes[] = ! empty( $atts['button_icon_position'] ) ? 'qodef-icon--' . $atts['button_icon_position'] : '';
			$holder_classes[] = ! empty( $atts['button_icon_hover_move'] ) ? 'qodef-hover--icon-' . $atts['button_icon_hover_move'] : '';
			$holder_classes[] = ! empty( $atts['button_icon_background_hover_reveal'] ) ? 'qodef-icon-background-hover--reveal qodef-icon-background-hover--' . $atts['button_icon_background_hover_reveal'] : '';
			$holder_classes[] = ! empty( $atts['button_inner_border_hover_type'] ) ? 'qodef-inner-border-hover--' . $atts['button_inner_border_hover_type'] : '';
			$holder_classes[] = 'yes' === $atts['button_underline'] ? 'qodef-text-underline' : '';
			$holder_classes[] = ! empty( $atts['button_underline_alignment'] ) ? 'qodef-underline--' . $atts['button_underline_alignment'] : '';
			$holder_classes[] = 'yes' === $atts['button_underline_draw'] ? 'qodef-button-underline-draw' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_icon_classes( $atts ) {
			$icon_classes[] = 'qodef-m-icon';
			$icon_classes[] = ! empty( $atts['button_icon_color'] ) ? 'qodef--icon-color-set' : '';

			return implode( ' ', $icon_classes );
		}

		private function get_data_attrs( $atts ) {
			$data = qi_addons_for_elementor_get_link_attributes( $atts['button_link'] );

			if ( ! empty( $atts['custom_attrs'] ) && is_array( $atts['custom_attrs'] ) ) {
				$data = array_merge( $data, $atts['custom_attrs'] );
			}

			return $data;
		}

		private function get_button_type( $atts ) {

			if ( 'textual' === $atts['button_layout'] ) {
				$type = 'standard';
			} else {
				$type = $atts['button_type'];
			}

			return $type;
		}
	}
}
