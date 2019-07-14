<!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>
	    Permissões
	  </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Itens de permissões</h3>
				<div class="box-tools">
					<a href="<?php echo BASE_URL.'permissions/items_add'; ?>" class="btn btn-success">Adicionar</a>
				</div>
			</div>
			<div class="box-body">
				
				<table class="table">
					<tr>
						<th>Nome do item de permissão</th>
						<th>Slug</th>
						<th>Ações</th>
					</tr>

					<?php foreach($list as $item): ?>
						<tr>
							<td><?php echo $item['name']; ?></td>
							<td><?php echo $item['slug']; ?></td>
							<td>
								<div class="btn-group">
									<a href="<?php echo BASE_URL.'permissions/items_edit/'.$item['id']; ?>" class="btn btn-xs btn-primary">Editar</a>
									<a href="<?php echo BASE_URL.'permissions/del/'.$item['id']; ?>" class="btn btn-xs btn-danger" >Excluir</a>									
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>

			</div>
		</div>

    </section>
    <!-- /.content -->