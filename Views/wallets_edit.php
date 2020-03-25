    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


          <form action="<?php echo BASE_URL; ?>wallets/edit_action/<?php echo $wallet_id; ?>" method="POST">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Editar Carteira</h3>
                <div class="card-tools">
                  <input type="submit" class="btn btn-success" value="Salvar"/>                
                </div>
              </div>
              
              <?php echo($wallet_name);?>
              <!-- <?php/*** print_r($permission_group_name); ***/?> -->
              <div class="card-body">
                <div class="form-group">
                  <label for="wallet_name">Carteira</label>
                    <input type="text" class="form-control
                    <?php 
                    echo (in_array('name', $errorItems))?'is-invalid':''; 
                    ?>" 
                    name="name" value="<?php echo $wallet_name;?>">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </form>             
          </div>
        </div>
      </div>
    </section>




































