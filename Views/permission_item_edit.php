<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Permissões
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <form action="<?php echo BASE_URL; ?>permissions/edit_action/<?php echo $permissions_id; ?>" method="POST">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Editar grupo de Permissões</h3>
        <div class="box-tools">
          <input type="submit" class="btn btn-success" value="Salvar" />
        </div>
      </div>
      <div class="box-body">
        <div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':''; ?>">
          <label for="group_name">Nome do grupo</label>
          <input type="text" name="name" id="group_name" class="form-control" value="<?php echo $permission_group_name; ?>" />
        </div>
        <hr/>
        
        <?php foreach($permission_items as $item): ?>
          <div class="form-group">
            <input
              <?php
              if(in_array($item['slug'], $permission_group_slugs)) {
                echo 'checked="checked"';
              }
              ?> 
              type="checkbox" name="items[]" value="<?php echo $item['id']; ?>" id="item-<?php echo $item['id']; ?>" />
            <label for="item-<?php echo $item['id']; ?>"><?php echo utf8_encode($item['name']); ?></label>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </form>
</section>
<!-- /.content -->