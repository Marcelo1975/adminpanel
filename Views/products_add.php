<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Produtos
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <form action="<?php echo BASE_URL; ?>products/add_action" method="POST" enctype="multipart/form-data">
    <div class="box">
    	<div class="box-header">
    		<h3 class="box-title">Novo produto</h3>
    		<div class="box-tools">
          <input type="submit" class="btn btn-success" value="Salvar" />
    		</div>
    	</div>
    	<div class="box-body">
        <div class="form-group <?php echo (in_array('id_category', $errorItems))?'has-error':''; ?>">
          <label for="p_cat">Categoria</label>
          <select name="id_category" id="p_cat" class="form-control" required="required">
            <?php $this->loadView('categories_add_item', array(
              'items' => $cat_list,
              'level' => 0
            )); ?>
          </select>
        </div>

        <div class="form-group <?php echo (in_array('id_brand', $errorItems))?'has-error':''; ?>">
          <label for="p_brand">Marca</label>
          <select name="id_brand" id="p_brand" class="form-control" required="required">
            <?php foreach($brands_list as $item): ?>
              <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':''; ?>">
          <label for="p_name">Nome do produto</label>
          <input type="text" name="name" id="p_name" class="form-control" required="required" />
        </div>
     
        <div class="form-group <?php echo (in_array('description', $errorItems))?'has-error':''; ?>">
          <label for="p_description">Descrição do produto</label>
          <textarea id="p_description" name="description"></textarea>
        </div>

        <div class="form-group <?php echo (in_array('stock', $errorItems))?'has-error':''; ?>">
          <label for="p_stock">Estoque disponível</label>
          <input type="number" name="stock" id="p_stock" class="form-control" required="required" />
        </div>

        <div class="form-group <?php echo (in_array('price_from', $errorItems))?'has-error':''; ?>">
          <label for="p_price_from">Preço (de)</label>
          <input type="text" name="price_from" id="p_price_from" class="form-control" />
        </div>

        <div class="form-group <?php echo (in_array('price', $errorItems))?'has-error':''; ?>">
          <label for="p_price">Preço (por)</label>
          <input type="text" name="price" id="p_price" class="form-control" required="required" />
        </div>

        <hr/>

        <div class="form-group <?php echo (in_array('weight', $errorItems))?'has-error':''; ?>">
          <label for="p_weight">Peso (em Kg)</label>
          <input type="text" name="weight" id="p_weight" class="form-control" />
        </div>

        <div class="form-group <?php echo (in_array('width', $errorItems))?'has-error':''; ?>">
          <label for="p_width">Largura (em cm)</label>
          <input type="text" name="width" id="p_width" class="form-control" />
        </div>

        <div class="form-group <?php echo (in_array('height', $errorItems))?'has-error':''; ?>">
          <label for="p_height">Altura (em cm)</label>
          <input type="text" name="height" id="p_height" class="form-control" />
        </div>

        <div class="form-group <?php echo (in_array('length', $errorItems))?'has-error':''; ?>">
          <label for="p_length">Comprimento (em cm)</label>
          <input type="text" name="length" id="p_length" class="form-control" />
        </div>

        <div class="form-group <?php echo (in_array('diameter', $errorItems))?'has-error':''; ?>">
          <label for="p_diameter">Diamentro (em cm)</label>
          <input type="text" name="diameter" id="p_diameter" class="form-control" />
        </div>

        <hr/>
  
        <div class="form-group <?php echo (in_array('featured', $errorItems))?'has-error':''; ?>">
          <label for="p_featured">Em destaque</label><br/>
          <input type="checkbox" name="featured" id="p_featured" />
        </div>

        <div class="form-group <?php echo (in_array('sale', $errorItems))?'has-error':''; ?>">
          <label for="p_sale">Em promoção</label><br/>
          <input type="checkbox" name="sale" id="p_sale" />
        </div>

        <div class="form-group <?php echo (in_array('bestseller', $errorItems))?'has-error':''; ?>">
          <label for="p_bestseller">Mais vendidos</label><br/>
          <input type="checkbox" name="bestseller" id="p_bestseller" />
        </div>

        <div class="form-group <?php echo (in_array('new_product', $errorItems))?'has-error':''; ?>">
          <label for="p_new_product">Novo produto</label><br/>
          <input type="checkbox" name="new_product" id="p_new_product" />
        </div>

        <hr/>
        <?php foreach($options_list as $opitem): ?>
        <div class="form-group">
          <label for="p_option_<?php echo $opitem['id']; ?>"><?php echo $opitem['name']; ?></label>
          <input type="text" name="options[<?php echo $opitem['id']; ?>]" id="p_option_<?php echo $opitem['id']; ?>" class="form-control" />
        </div>  
        <?php endforeach; ?>
        <hr/>
        <label>Imagens do Produto</label><br/>
        <button class="p_new_image btn btn-primary">+</button>
        <div class="products_files_area">
          <input type="file" name="images[]" />
        </div>
    	</div>
    </div>
  </form>
</section>
<!-- /.content -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=pbyqnbudy0yt531ocjysos5b4fw3d1k4exbpr6bv2xqdtbpv"></script>
<script type="text/javascript">
  tinymce.init({
    selector:'#p_description',
    height:200,
    menubar:false,
    plugins:[
      'textcolor image media lists'
    ],
    toolbar:'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | bullist removeformat'
  });
</script>