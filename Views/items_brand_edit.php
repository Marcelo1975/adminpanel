<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Marcas
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <form action="<?php echo BASE_URL; ?>brands/items_brand_edit_action/<?php echo $brand_id; ?>" method="POST">
    <div class="box">
    	<div class="box-header">
    		<h3 class="box-title">Editar marca</h3>
    		<div class="box-tools">
          <input type="submit" class="btn btn-success" value="Salvar" />
    		</div>
    	</div>
    	<div class="box-body">
        <div class="form-group">
          <label for="group_name">Nome da marca</label>
          <input type="text" name="name" id="group_name" class="form-control" value="<?php echo $brand_item['name']; ?>" />
    	</div>
    </div>
  </form>
</section>
<!-- /.content -->