    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <form action="<?php echo BASE_URL; ?>goals/add_action" method="POST" enctype="multipart/form-data">
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
                  <label for="cpf">CPF <p class="text-muted"> criar um filtro para cpf</p></label>
                </div>     
                   <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="position">Nome</label>
                        <input type="text" class="form-control" id="position" name="postion" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="quartil">Meta</label>
                        <input type="number" class="form-control" id="quartil" name="quartil" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="month">Mês Referência</label>
                        <input type="text" class="form-control" id="month" name="month" required>
                      </div>                      
                      <div class="form-group col-md-3">
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




































