<!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>
	    Produtos
	  </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    	<form method="POST" action="<?php echo BASE_URL; ?>products/add_action">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Novo produto</h3>
					<div class="box-tools">
						<input type="submit" class="btn btn-success" value="Salvar">
					</div>
				</div>
				<div class="box-body">

					<div class="form-group <?php echo (in_array('id_category', $errorItems))?'has-error':'';?>">
						<label for="p_cat">Categoria</label>
						<select required name="id_category" id="p_cat" class="form-control">
							<?php $this->loadView('categories_add_item', array(
								'itens' => $cat_list,
								'level' => 0
							)); ?>
						</select>
					</div>

					<div class="form-group <?php echo (in_array('id_brand', $errorItems))?'has-error':'';?>">
						<label for="p_brand">Marca</label>
						<select name="id_brand" id="p_brand" class="form-control">
							<?php foreach ($brands_list as $item): ?>
								<option value="<?php echo $item['id']; ?>"> <?php echo $item['name']; ?> </option>
							<?php endforeach; ?>

						</select>
					</div>
					
					<div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':'';?>">
						<label for="p_name">Nome do produto</label>
						<input type="text" class="form-control" id="p_name" name="name">
					</div>

					<div class="form-group <?php echo (in_array('description', $errorItems))?'has-error':'';?>">
						<label for="p_description">Descrição do produto</label>
						<textarea type="text" id="p_description" name="description"></textarea>
					</div>

					<div class="form-group <?php echo (in_array('stock', $errorItems))?'has-error':'';?>">
						<label for="p_stock">Estoque Disponível</label>
						<input type="number" class="form-control" id="p_stock" name="stock">
					</div>

					<div class="form-group <?php echo (in_array('price_from', $errorItems))?'has-error':'';?>">
						<label for="p_price_from">Preço (de):</label>
						<input type="text" class="form-control" id="p_from" name="price_from">
					</div>

					<div class="form-group <?php echo (in_array('price', $errorItems))?'has-error':'';?>">
						<label for="p_price">Preço (por):</label>
						<input type="text" class="form-control" id="p_price" name="price">
					</div>

					<hr/>

					<div class="form-group <?php echo (in_array('weight', $errorItems))?'has-error':'';?>">
						<label for="p_weight">Peso (em Kg)</label>
						<input type="text" class="form-control" id="p_weight" name="weight">
					</div>

					<div class="form-group <?php echo (in_array('width', $errorItems))?'has-error':'';?>">
						<label for="p_width">Largura (em Cm)</label>
						<input type="text" class="form-control" id="p_width" name="width">
					</div>

					<div class="form-group <?php echo (in_array('height', $errorItems))?'has-error':'';?>">
						<label for="p_height">Altura (em Cm)</label>
						<input type="text" class="form-control" id="p_height" name="height">
					</div>

					<div class="form-group <?php echo (in_array('length', $errorItems))?'has-error':'';?>">
						<label for="p_length">Comprimento (em Cm)</label>
						<input type="text" class="form-control" id="p_length" name="length">
					</div>

					<div class="form-group <?php echo (in_array('diameter', $errorItems))?'has-error':'';?>">
						<label for="p_diameter">Diâmetro (em Cm)</label>
						<input type="text" class="form-control" id="p_diameter" name="diameter">
					</div>

					<hr/>

					<div class="form-group <?php echo (in_array('featured', $errorItems))?'has-error':'';?>">
						<label for="p_featured">Em destaque</label><br>
						<input type="checkbox" id="p_featured" name="featured">
					</div>

					<div class="form-group <?php echo (in_array('sale', $errorItems))?'has-error':'';?>">
						<label for="p_sale">Em promoção</label><br>
						<input type="checkbox" id="p_sale" name="sale">
					</div>

					<div class="form-group <?php echo (in_array('bestseller', $errorItems))?'has-error':'';?>">
						<label for="p_bestseller">Mais vendido</label><br>
						<input type="checkbox" id="p_bestseller" name="bestseller">
					</div>

					<div class="form-group <?php echo (in_array('new_product', $errorItems))?'has-error':'';?>">
						<label for="p_new_product">Produto novo</label><br>
						<input type="checkbox" id="p_new_product" name="new_product">
					</div>

					<hr/>

					<?php foreach ($options_list as $opitem): ?>
					<div class="form-group">
						<label for="p_option_<?php echo $opitem['id']; ?>"> <?php echo $opitem['name']; ?> </label><br/>
						<input type="text" name="options[<?php echo $opitem['id']; ?>]" id="<?php echo $opitem['id']; ?>" class="form-control">
					</div>

					<?php endforeach; ?>

					<!--<hr/>
					<label>Imagens do Produto</label>

					<button class="p_new_image btn btn-primary">+</button>

					<div class="products_files_area">
						<input type="file" name="images[]" />
					</div>-->

				</div>
			</div>
		</form>	

    </section>
    <!-- /.content -->

<script src="https://cdn.tiny.cloud/1/69pxz14adu5uszmlktj5ka887fklproqk343phdg9jvsiqdf/tinymce/5/tinymce.min.js"></script>

<script type="text/javascript">
	tinymce.init({
		selector:'#p_description',
		height: 200,
		menubar: false,
		plugins: [
			'textcolor image media lists'
		],
		toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat',
	});
</script>