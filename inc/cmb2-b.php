<?php 
	add_action( 'cmb2_init', 'mamurjor_metabox' );
	function mamurjor_metabox() {

		$prefix = '_mamurjor_';

		$cmb = new_cmb2_box( array(
			'id'           => $prefix . 'device_info',
			'title'        => __( 'Device Info', 'mamurjor' ),
			'object_types' => array( 'post' ),
			'context'      => 'normal',
			'priority'     => 'default',
		) );

		$cmb->add_field( array(
			'name' => __( 'device name', 'mamurjor' ),
			'id' => $prefix . 'device_name',
			'type' => 'text',
			'default' => 'zotac',
		) );

		$cmb->add_field( array(
			'name' => __( 'processor', 'mamurjor' ),
			'id' => $prefix . 'processor',
			'type' => 'text',
		) );

		$cmb->add_field( array(
			'name' => __( 'manufacture date', 'mamurjor' ),
			'id' => $prefix . 'manufacture_date',
			'type' => 'text_date',
		) );

		$cmb->add_field( array(
			'name' => __( 'warranty', 'mamurjor' ),
			'id' => $prefix . 'warranty',
			'type' => 'checkbox',
		) );

		$cmb->add_field( array(
			'name' => __( 'warranty', 'mamurjor' ),
			'id' => $prefix . 'warranty_info',
			'type' => 'textarea',
			'attributes' => array(
				'data-conditional-id' => $prefix . 'warranty',
				//'data-conditional-value' => 'off'
			),
		) );

		$cmb->add_field(array(
			'name' => __('thumbnail', 'mamurjor'),
			'id' => $prefix . 'thumb',
			'type' => 'file'
		));

	}