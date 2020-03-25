    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Itens de Permissões</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                 <a href="<?php echo BASE_URL.'permissions/items_add'; ?>" class="btn btn-sm btn-success">Adicionar</a>
                </div>
              </div>
              <div class="card-body">
					<table class="table">
						<tr>
						<th>Descrição</th>
		        <th>Slug</th>
						<th width="120">Ações</th>						   								
						</tr>			
						<?php foreach ($items as $i):   ?>												
						<tr>
							<td><?php echo $i['name']?></td>
							<td><?php echo $i['slug']?></td>
							<td>
								<div class="btn-group">
									<a href="<?php echo BASE_URL.'permissions/items_edit/'.$items['id'];?>" class="btn btn-xs btn-primary"> Editar </a>
									<a href="<?php echo BASE_URL.'permissions/items_del/'.$items['id'];?>" class="btn btn-xs btn-danger"> Excluir </a>
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




































