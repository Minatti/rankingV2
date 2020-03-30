    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <form action="<?php echo BASE_URL; ?>rankings/add_action" method="POST" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <!-- 
                <h3 class="card-title callout callout-primary text-primary">
                 <?php 
                  /*  
                    date_default_timezone_set('America/Sao_Paulo');
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    echo ucfirst(utf8_encode(strftime("%B de %Y")));   
                  */                 
                  ?>            
                  </h3>
                  -->    
                <div class="card-tools">
                  <input type="submit" class="btn btn-sm btn-success" value="Salvar"/>                
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="select">Selecione a Carteira: </label>
                    <select class="custom-select ?php echo (in_array('name', $errorItems))?'is-invalid':''; ?>" id="wallet" name="wallet" required>
                      <option></option>
                    <?php foreach($wallets as $wallet): ?>                      
                          <option value="<?php echo $wallet['id'];?>"><?php echo $wallet['name'];?></option>
                    <?php endforeach; ?>  
                   </select>
                </div> 
                <div class="form-group">
                <label for="select">Produto</label>
                  <select class="custom-select" id="products" name="product" required>

                  </select>   
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Anexar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="files[]">
                        <label class="custom-file-label" for="file">Escolher Arquivo...</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>        
                   <div class="form-row">
                      <div class="form-group col-md-1">
                        <label for="position">Posição</label>
                        <input type="text" class="form-control" id="position" name="postion" required>
                      </div>
                      <div class="form-group col-md-1">
                        <label for="quartil">Quartil</label>
                        <input type="text" class="form-control" id="quartil" name="quartil" required>
                      </div>
                      <div class="form-group col-md-1">
                        <label for="month">Mês</label>
                        <input type="text" class="form-control" id="month" name="month" required>
                      </div>                      
                      <div class="form-group col-md-2">
                        <input type="hidden" class="form-control" id="year" value="<?php echo date('Y'); ?>" name="year">
                      </div>     
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




































