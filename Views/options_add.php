<!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>
	    Opções
	  </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    	<form method="POST" action="<?php echo BASE_URL; ?>options/add_action">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Nova opção</h3>
					<div class="box-tools">
						<input type="submit" class="btn btn-success" value="Salvar">
					</div>
				</div>
				<div class="box-body">
			
					<div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':'';?>">
						<label for="options_name">Nome</label>
						<input type="text" class="form-control" id="options_name" name="name">
					</div>
					<hr>
				</div>
			</div>
		</form>	

    </section>
    <!-- /.content -->