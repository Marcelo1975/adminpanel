<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Categorias
  </h1>
</section>

<section class="content container-fluid">

  <div class="box">
  	<div class="box-header">
  		<h3 class="box-title">Categorias</h3>
  		<div class="box-tools">
  			<a href="<?php echo BASE_URL.'categories/add'; ?>" class="btn btn-success">Adicionar</a>
  		</div>
  	</div>
  	<div class="box-body">
  		<table class="table">
  			<th>Nome da categoria</th>
  			<th width="130">Ações</th>

			<?php $this->loadView('categories_item', array(
				'items' => $list,
				'level' => 0
			)); ?>

  		</table>
  	</div>
  </div>

</section>