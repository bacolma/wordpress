<?php namespace Pluginbase\Core;

$xbox->add_field(array(
	'id' => 'recommendation-title',
	'name' => __( 'Relation between HRA feedback and RAMP Modules', IHO_DEVCORT_TEXT_DOMAIN ),
	'type' => 'title',
	'desc' => 'V3. 20201121',
));

$xbox->add_field( [
    'id' => 'select-form-hra' ,
    'name' => __( 'QuForms' , IHO_DEVCORT_TEXT_DOMAIN ) ,
    'desc_title' => 'Forms created in Quforms' ,
    'desc' => 'Select a form' ,
    'type' => 'select' ,
    'default' => '' ,
    'items' => $arr_form ,
    'attributes' => [
        'required' => true ,
    ] ,
] );

$xbox->add_field( [
    'id' => 'recommendation_hra_score' ,
    'name' => __( 'Highly recommended Sugestion' , IHO_DEVCORT_TEXT_DOMAIN ) ,
    'type' => 'number' ,
    'default' => 3 ,
    'attributes' => [
        'required' => true ,
        'min' => 1,//Default: 'null'
    ] ,
    'options' => array(
		'unit' => '',
	),    
] );

