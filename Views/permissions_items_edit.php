    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


          <form action="<?php echo BASE_URL; ?>permissions/edit_action/<?php echo $permission_id; ?>" method="POST">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Editar Item de Permissão</h3>
                <div class="card-tools">
                  <input type="submit" class="btn btn-success" value="Salvar"/>                
                </div>
              </div>

              <!-- <?php/*** echo print_r($permission_group_name); ***/?> -->
              <div class="card-body">
                <div class="form-group">
                  <label for="group_name">Grupo</label>
                    <input type="text" class="form-control
                    <?php 
                    echo (in_array('name', $errorItems))?'is-invalid':''; 
                    ?>" 
                    name="name" value="<?php echo $permission_group_name;?>">
                </div>
                
                <!-- <?php /*** print_r($permission_group_slugs); ***/?> -->

                <hr/>
                <?php foreach($permission_items as $item): ?>
                   <div class="form-group mb-0">
                      <div class="custom-control custom-checkbox">
                        <input
                        <?php 
                        if(in_array($item['slug'], $permission_items)) {
                           echo 'checked="checked"';
                         }
                       ?>
                       type="checkbox" class="custom-control-input" name="items[]" 
                       value="<?php echo $item['id'];?>" id="item-<?php echo $item['id'];?>"
                       aria-describedby="terms-error" aria-invalid="false" />
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




































