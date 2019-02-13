<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Marcas
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <form action="<?php echo BASE_URL; ?>brands/add_action" method="POST">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Nova marca</h3>
        <div class="box-tools">
          <input type="submit" class="btn btn-success" value="Salvar" />
        </div>
      </div>
      <div class="box-body">
        <div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':''; ?>">
          <label for="group_name">Nome da marca</label>
          <input type="text" name="name" id="group_name" class="form-control" />
        </div>
        <hr/>
        
        <?php foreach($brands_items as $item): ?>
          <div class="form-group">
            <label for="item-<?php echo $item['id']; ?>"><?php echo utf8_encode($item['name']); ?></label>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </form>
</section>
<!-- /.content -->