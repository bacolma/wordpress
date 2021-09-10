<?php
add_action('wp_ajax_wqnew_entry', 'wqnew_entry_callback_function');
add_action('wp_ajax_nopriv_wqnew_entry', 'wqnew_entry_callback_function');

function wqnew_entry_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `wp_personas` WHERE `nombre` = '".$_POST['wqnombre']."' AND `apellido` = '".$_POST['wqapellido']."' AND `sexo` = '".$_POST['wqsexo']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->insert("wp_personas", array(
      "nombre" => $_POST['wqnombre'],
      "apellido" => $_POST['wqapellido'],
      "sexo" => $_POST['wqsexo'],
      "created_at" => time(),
      "updated_at" => time()
    ));

    $response = array('message'=>'Se registro Correctamente', 'rescode'=>200);
  } else {
    $response = array('message'=>'La persona ya existe', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}



add_action('wp_ajax_wqedit_entry', 'wqedit_entry_callback_function');
add_action('wp_ajax_nopriv_wqedit_entry', 'wqedit_entry_callback_function');

function wqedit_entry_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `wp_personas` WHERE `nombre` = '".$_POST['wqnombre']."' AND `apellido` = '".$_POST['wqapellido']."' AND `sexo` = '".$_POST['wqsexo']."' AND `id`!='".$_POST['wqentryid']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->update( "wp_personas", array(
      "nombre" => $_POST['wqnombre'],
      "apellido" => $_POST['wqapellido'],
      "sexo" => $_POST['wqsexo'],
      "updated_at" => time()
    ), array('id' => $_POST['wqentryid']) );

    $response = array('message'=>'Modificacion Exitosa', 'rescode'=>200);
  } else {
    $response = array('message'=>'La persona ya existe', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}
