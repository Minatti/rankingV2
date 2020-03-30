    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rank</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <a href="<?php echo BASE_URL.'rankings/goals'; ?>" class="btn btn-sm btn-primary">Metas</a>                
                 <a href="<?php echo BASE_URL.'rankings/add'; ?>" class="btn btn-sm btn-success">Adicionar</a>
                </div>
              </div>
              <div class="card-body">
      					<table class="table">
      						<tr>
      						<th>Carteira</th> 
      						<th>Produto</th>
                  <th>Arquivo</th>
                  <th>Posicão</th>
                  <th>Quartil</th>
                  <th>Mês</th>
                  <th>Ano</th>		   								
      						</tr>      				
      						<?php foreach ($list as $item):  ?>												
      						<tr>
      							<td><?php echo $item['carteira']?></td>
      							<td><?php echo $item['produto']?></td>
                    <td><?php echo $item['arquivo']?></td>
                    <td><?php echo $item['posicao']?></td>
                    <td><?php echo $item['quartil']?></td>
                    <td><?php echo $item['mes']?></td>
                    <td><?php echo $item['ano']?></td>
      						</tr>
      					  <?php endforeach; ?>					
      					</table>		          
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>




































