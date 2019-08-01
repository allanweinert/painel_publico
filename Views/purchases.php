<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administração de Pedidos
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pedidos</h3>
      <div class="box-body">
        
        <table class="table">
          <tr>
            <th>Pedido Nº</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor Unit.</th>
            <th>Total</th>
            <th>Ações</th>
          </tr>

          <?php foreach($list as $item): ?>
          	<tr>
              <td><?php echo $item['id_purchase'] ?></td> 
              <td><?php echo $item['users_name'] ?></td>               
          		<td><?php echo $item['products_name'] ?></td>
              <td><?php echo $item['quantity'] ?></td>
              <td><?php echo number_format($item['product_price'],2,',','.') ?></td>
              <td>R$<?php echo number_format($item['total_amount'],2,',','.') ?></td>
          		<td>
					<div class="btn-group">
						<a href="<?php echo BASE_URL.'purchases/edit/'.$item['id']; ?>" class="btn btn-xs btn-primary">Editar</a>
						<a href="<?php echo BASE_URL.'purchases/del/'.$item['id']; ?>" class="btn btn-xs btn-danger" >Excluir</a>    
					</div>
          		</td>
          	</tr>
          <?php endforeach; ?>
        </table>

      </div>
    </div>

    </section>
    <!-- /.content -->