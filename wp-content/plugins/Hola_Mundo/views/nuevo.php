<?php
if(isset($_REQUEST['entryid']) && $_REQUEST['entryid']!='') {
  global $wpdb;
  $data = $wpdb->get_row( "SELECT * FROM `wp_personas` WHERE id = '".$_REQUEST['entryid']."'" );
?>
  <div class="wrap wqmain_body">
    <h3 class="wqpage_heading">Modificar Persona</h3>
    <div class="wqform_body">
      <form name="update_form" id="update_form">
        <input type="hidden" name="wqentryid" id="wqentryid" value="<?=$_REQUEST['entryid']?>" />
        <div class="wqlabel">Nombre</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqnombre" id="wqnombre" placeholder="nombre" value="<?=$data->nombre?>" />
        </div>
        <div id="wqnombre_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Apellido</div>
        <div class="wqfield">
          <input name="wqapellido" class="wqtextfield" id="wqapellido" placeholder="apellido" value="<?=$data->apellido?>" />
        </div>
        <div id="wqapellido_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Sexo</div>
        <div class="wqfield">
          <input name="wqsexo" class="wqtextfield" id="wqsexo" placeholder="sexo" value="<?=$data->sexo?>" />
        </div>
        <div id="wqsexo_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div><input type="submit" class="wqsubmit_button" id="wqedit" value="Modificar" /></div>
        <div>&nbsp;</div>
        <div class="wqsubmit_message"></div>

      </form>
    </div>
  </div>
<?php
} else {
?>
<div class="wrap wqmain_body">
  <h3 class="wqpage_heading">Nueva Persona</h3>
  <div class="wqform_body">
    <form name="entry_form" id="entry_form">
      <div class="wqfield">
        <span class="wqlabel"> Nombre: </span><input type="text" class="wqtextfield" name="wqnombre" id="wqnombre" placeholder="Nombre de Persona" required/>
      </div>
      <div id="wqnombre_message" class="wqmessage"></div>
      <div>&nbsp;</div>
      <div class="wqfield">
        <span class="wqlabel"> Apellido: </span><input type="text" class="wqtextfield" name="wqapellido" id="wqapellido" placeholder="Apellido de Persona" required/>
      </div>
      <div id="wqapellido_message" class="wqmessage"></div>
      <div>&nbsp;</div>
      <div class="wqfield">
        <span class="wqlabel"> Sexo: </span><input type="text" class="wqtextfield" name="wqsexo" id="wqsexo" placeholder="Sexo de Persona" required/>
      </div>
      <div id="wqsexo_message" class="wqmessage"></div>
      <div>&nbsp;</div>
      <div><input type="submit" class="wqsubmit_button" id="wqadd" value="Registrar" /></div>
      <div>&nbsp;</div>
      <div class="wqsubmit_message"></div>
    </form>
  </div>
</div>
<?php } ?>
