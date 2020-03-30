    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


          <form action="<?php echo BASE_URL; ?>products/add_action" method="POST">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Novo Produto</h3>
                <div class="card-tools">
                  <input type="submit" class="btn btn-sm btn-success" value="Salvar"/>                
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="group_name">Nome do Produto</label>
                  <input type="text" name="name" class="form-control <?php echo (in_array('name', $errorItems))?'is-invalid':''; ?>" id="group_name" placeholder="Preencha o campo">
                  <span id="group_name" class="error invalid-feedback" style="">Por favor, insira o novo produto</span>
                </div>
                <div class="form-group">
                  <label for="wallet">Carteira</label>
                    <select class="form-control ?php echo (in_array('name', $errorItems))?'is-invalid':''; ?>" id="wallet" name="wallet">
                    <?php foreach($list as $wallet): ?>                      
                          <option value="<?php echo $wallet['id'];?>"><?php echo $wallet['name'];?></option>
                    <?php endforeach; ?>  
                   </select>
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




































