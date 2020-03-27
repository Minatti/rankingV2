    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grupos de Permissões</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                 <a href="<?php echo BASE_URL.'permissions/items'; ?>" class="btn btn-sm btn-primary">Items de Permissões</a>                
                 <a href="<?php echo BASE_URL.'permissions/add'; ?>" class="btn btn-sm btn-success">Adicionar</a>
                </div>
              </div>
              <div class="card-body">
					<table class="table">
						<tr>
						<th>Nome</th>
						<th width="120">Qtd de ativos</th>
						<th width="120">Ações</th>						   								
						</tr>
						
						<?php foreach ($list as $item):   ?>												
						<tr>
							<td><?php echo $item['name']?></td>
							<td><?php echo $item['total_users']?></td>
							<td>
								<div class="btn-group">
									<a href="<?php echo BASE_URL.'permissions/edit/'.$item['id'];?>" class="btn btn-xs btn-primary"> Editar </a>
									<a href="<?php echo BASE_URL.'permissions/del/'.$item['id'];?>" class="btn btn-xs btn-danger <?php echo ($item['total_users']!='0')?'disabled':'' ?>"> Excluir </a>
								</div>
							</td>
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




































