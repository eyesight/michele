<?php

class FooterNavWalker extends Walker_Nav_Menu {

	public $css_base = 'footer';


	public function __construct( $base = '' ) {
		if ( '' != $base ) {
			$this->css_base = $base;
		}
	}


	public function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}


	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$real_depth = $depth + 1;
		$indent = str_repeat( "\t", $real_depth );
		$prefix = $this->css_base;
		$classes = [
			"{$prefix}__level-{$real_depth}",
		];
		$output .= "\n" . $indent . '<ul class="' . implode( ' ', $classes ) . '">' . "\n";
	}


	// Add main/sub classes to li's and links
	public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( '    ', $depth ) : '' );
		$prefix = $this->css_base;
		/**
		 * Item
		 */

		$item_classes = [];
		$item_classes['item_class'] = "{$prefix}__nav-item-level-{$depth}";
		if ( isset( $args->has_children ) && $args->has_children ) {
			$item_classes['parent_class'] = "{$prefix}__nav-item--has-children";
		} else {
			$item_classes['parent_class'] = "{$prefix}__nav-item--has-no-children";
		}
		if ( isset( $item->classes ) ) {
			if ( in_array( 'current-menu-item', $item->classes ) ) {
				$item_classes['active_page_class'] = "{$prefix}__nav-item--active";
			}
			if ( in_array( 'current-menu-parent', $item->classes ) ) {
				$item_classes['active_parent_class'] = "{$prefix}__nav-item--parent-active";
			}
			if ( in_array( 'current-menu-ancestor', $item->classes ) ) {
				$item_classes['active_ancestor_class'] = "{$prefix}__nav-item--ancestor-active";
			}
			if ( '' !== $item->classes[0] ) {
				$item_classes['user_class'] = $item->classes[0];
			}
		}
		// Attributes
		$item_attributes = [];
		$item_attributes['id'] = $prefix . '-item-' . $item->object_id;
		if ( ! empty( $item_classes ) ) {
			$item_attributes['class'] = implode( ' ', $item_classes );
		}
		array_walk( $item_attributes, 'esc_attr' );
		// Markup
		$item_markup = $indent;
		$item_markup .= '<li';
		foreach ( $item_attributes as $att => $value ) {
			$item_markup .= " $att='$value'";
		}
		$item_markup .= '>';
		/**
		 * Link
		 */
		$link_classes = [];
		$link_classes[] = "{$prefix}__link-level-{$depth}";
		// Attributes
		$link_attributes = [];
		if ( ! empty( $item->attr_title ) ) {
			$link_attributes['title'] = $item->attr_title;
		}
		if ( ! empty( $item->target ) ) {
			$link_attributes['target'] = $item->target;
		}
		if ( ! empty( $item->xfn ) ) {
			$link_attributes['rel'] = $item->xfn;
		}
		if ( ! empty( $item->url ) ) {
			$link_attributes['href'] = $item->url;
		}
		if ( ! empty( $link_classes ) ) {
			$link_attributes['class'] = implode( ' ', $link_classes );
		}
		array_walk( $link_attributes, 'esc_attr' );
		// Markup
		$link_markup = '';
		if ( isset( $args->before ) ) {
			$link_markup .= $args->before;
		}

		$link_markup .= '<a';
		foreach ( $link_attributes as $att => $value ) {
			$link_markup .= " $att='$value'";
		}

		$link_markup .= '>';
		if ( isset( $args->link_before ) ) {
			$link_markup .= $args->link_before;
		}
	
		$link_markup .= apply_filters( 'the_title', $item->title, $item->ID );

		if ( isset( $args->link_after ) ) {
			$link_markup .= $args->link_after;
		}
		
		$link_markup .= '</a>';
		
		/**
		 * create markup
		 */
		$output .= $item_markup . apply_filters( 'walker_nav_menu_start_el', $link_markup, $item, $depth, $args );

		return $output;
	}
}
