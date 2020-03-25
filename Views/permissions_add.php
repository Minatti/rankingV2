    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


          <form action="<?php echo BASE_URL; ?>permissions/add_action" method="POST">
            <!-- Default box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Novo grupo de Permissão</h3>
                <div class="card-tools">
                  <input type="submit" class="btn btn-sm btn-default" value="Salvar"/>                
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="group_name">Nome do grupo</label>
                  <input type="text" name="name" class="form-control <?php echo (in_array('name', $errorItems))?'is-invalid':''; ?>" id="group_name" placeholder="Preencha o campo">
                  <span id="group_name" class="error invalid-feedback" style="">Por favor, insira o novo nome</span>
                </div>
                                
                <hr/>
                
                  <?php foreach($permission_items as $item): ?>
                    <div class="form-group mb-0">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="items[]" value="<?php echo $item['id'];?>" id="item-<?php echo $item['id'];?>" aria-describedby="terms-error" aria-invalid="false" />
                      <label class="custom-control-label" for="item-<?php echo $item['id']; ?>"><?php echo $item ['name']; ?></label>  
                      </div>
                      
                    </div>
                  <?php endforeach; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </form>             
          </div>
        </div>
      </div>
    </section>




































