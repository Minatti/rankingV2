    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <form action="<?php echo BASE_URL; ?>wallets/add_action" method="POST">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Nova Carteira</h3>
                <div class="card-tools">
                  <input type="submit" class="btn btn-sm btn-success" value="Salvar"/>                
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="group_name">Nome da Carteira</label>
                  <input type="text" name="name" class="form-control <?php echo (in_array('name', $errorItems))?'is-invalid':''; ?>" id="wallet_name">
                  <span id="group_name" class="error invalid-feedback" style="">Por favor, insira o novo nome</span>
                </div>                           
                <hr/>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </form>             
          </div>
        </div>
      </div>
    </section>




































