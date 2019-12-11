<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5dc31ce7c6795',
	'title' => 'Copyright',
	'fields' => array(
		array(
			'key' => 'field_5dc31d58cf345',
			'label' => 'Copyright',
			'name' => 'copyright',
			'type' => 'text',
			'instructions' => 'Copyright einfügen',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Name',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => 'Bitte hier das Copyright eingeben',
));

acf_add_local_field_group(array(
	'key' => 'group_5debcac9e1c87',
	'title' => 'Datum',
	'fields' => array(
		array(
			'key' => 'field_5debcb34b8013',
			'label' => 'Datum',
			'name' => 'date',
			'type' => 'date_picker',
			'instructions' => 'Datum für die Sortierung der Posts',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => 'Datum der Arbeit für die Sortierung',
));

acf_add_local_field_group(array(
	'key' => 'group_5df1658ed889a',
	'title' => 'lead',
	'fields' => array(
		array(
			'key' => 'field_5df165e5961bf',
			'label' => 'Lead',
			'name' => 'lead',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
?>