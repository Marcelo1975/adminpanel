<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Páginas
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <form action="<?php echo BASE_URL; ?>pages/edit_action/<?php echo $info['id']; ?>" method="POST">
    <div class="box">
    	<div class="box-header">
    		<h3 class="box-title">Editar página</h3>
    		<div class="box-tools">
          <input type="submit" class="btn btn-success" value="Salvar" />
    		</div>
    	</div>
    	<div class="box-body">
        <div class="form-group <?php echo (in_array('title', $errorItems))?'has-error':''; ?>">
          <label for="page_title">Título da página</label>
          <input type="text" name="title" id="page_title" class="form-control" value="<?php echo $info['title']; ?>" />
        </div> 

        <div class="form-group <?php echo (in_array('body', $errorItems))?'has-error':''; ?>">
          <label for="page_body">Corpo da página</label>
          <textarea id="page_body" name="body"><?php echo $info['body']; ?></textarea>
        </div>       
    	</div>
    </div>
  </form>
</section>
<!-- /.content -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=pbyqnbudy0yt531ocjysos5b4fw3d1k4exbpr6bv2xqdtbpv"></script>
<script type="text/javascript">
  tinymce.init({
    selector:'#page_body',
    height:500,
    menubar:false,
    plugins:[
      'textcolor image media lists'
    ],
    toolbar:'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | bullist removeformat',
    automatic_upload:true,
    file_picker_types:'image',
    images_upload_url:'<?php echo BASE_URL; ?>pages/upload'
  });
</script>