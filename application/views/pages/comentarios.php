<script>
$(document).ready(function(){
	$('#eliminar').click(function(){
		$('input:checked').each(function() {
		    var elem = $(this).attr('id');
			$.ajax({
			       type: "POST",
			       url: "<?=base_url()?>index.php/comentario/deleteComentarios/"+elem
			});
		});
 		$(":checked").parent().parent().remove();
	});

});

</script>
<?php if (validation_errors()){?>
<div class="alert alert-dismissable alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>ERROR</strong>
	<?php echo validation_errors(); ?>
</div>
<?php }?>
<?php echo form_open('gastos/addGasto'); ?>
   <div class="row">
            
              
            <h2>Comentarios</h2>
  
            <button type="button" id="eliminar"class="btn btn-danger">Eliminar</button>
            
            <br>
            <br>
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter" id="tablaGastos" xagregar="false">
                <thead>
                  <tr>
                    <th class="header">Seleccionar<i class=""></i></th>                    
                    <th class="header">Nombre<i class=""></i></th>
                    <th class="header headerSortDown">Comentario<i class=""></i></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($comentarios as $item): ?>                  
                <tr>
                  <td><input type="checkbox" id="<?php print_r($item->idComentario);?>" class="fila" ></td>
                  <td><input class="formulario" id="nombre-<?php print_r($item->idComentario);?>" style='width: 100%; border:none;' type='text' value='<?php print_r($item->Nombre);?>'/></td>
                  <td><textarea class="formulario" id="importe-<?php print_r($item->idComentario);?>" style='width: 100%; border:none;' ><?php print_r($item->Comentario);?></textarea></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>