<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Opções
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <form action="<?php echo BASE_URL; ?>options/action_edit/<?php echo $option_id; ?>" method="POST">
    <div class="box">
    	<div class="box-header">
    		<h3 class="box-title">Editar opção</h3>
    		<div class="box-tools">
          <input type="submit" class="btn btn-success" value="Salvar" />
    		</div>
    	</div>
    	<div class="box-body">
        <div class="form-group">
          <label for="option_name">Nome da opção</label>
          <input type="text" name="name" id="option_name" class="form-control" value="<?php echo $option_item['name']; ?>" />
    	</div>
    </div>
  </form>
</section>
<!-- /.content -->