    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">   
          <!--
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>php</h5>
              </div> 
          -->              
            <!-- Default box -->
            <div class="card">
                <div class="card-header">                                                    
                  <h3 class="card-title">Produtos</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>              
                   <a href="<?php echo BASE_URL.'products/add'; ?>" class="btn btn-sm btn-success">Adicionar</a>
                  </div>
                </div>
                  <div class="card-body">
          					<table class="table">
          						<tr>          				
                      <th>Carteira</th>
          						<th>Nome</th>
          						<th width="100">Ações</th>                      						   							
          						</tr>          					
          						<?php foreach ($data as $item):   ?>												
          						<tr>
                        <td><?php echo $item['wallet']?></td>
                        <td><?php echo $item['product']?></td>           						
          							<td>
          								<div class="btn-group">
          									<a href="<?php echo BASE_URL.'products/edit/'.$item['id'];?>" class="btn btn-xs btn-primary"> Editar </a>
          									<a href="<?php echo BASE_URL.'products/del/'.$item['id'];?>"  class="btn btn-xs btn-danger <?php echo ($item['total_products']!='0')?'disabled':'' ?>"> Excluir </a>
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




































