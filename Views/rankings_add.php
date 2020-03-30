    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <form method="POST" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title callout callout-primary text-primary">
                  <?php   
                    date_default_timezone_set('America/Sao_Paulo');
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    echo ucfirst(utf8_encode(strftime("%B de %Y")));                    
                  ?>                    
                  </h3>
                <div class="card-tools">
                  <input type="submit" class="btn btn-sm btn-success" value="Salvar"/>                
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="select">Selecione a Carteira: </label>
                    <select class="custom-select ?php echo (in_array('name', $errorItems))?'is-invalid':''; ?>" id="wallet" name="wallet">
                      <option></option>
                    <?php foreach($wallets as $wallet): ?>                      
                          <option value="<?php echo $wallet['id'];?>"><?php echo $wallet['name'];?></option>
                    <?php endforeach; ?>  
                   </select>
                </div> 
                <div class="form-group">
                <label for="select">Produto</label>
                  <select class="custom-select" id="products" name="products">

                  </select>   
                </div>
                <div>
                    
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




































