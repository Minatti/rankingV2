<!-- carteiras -->
<div class="container-fluid">
        <div class="row">
          <?php foreach ($list as $item):  ?>  
          <div class="col-lg-3">
            <div class="card card-primary card-outline">
              <div class="card-body">               
                <h5 class="card-title"><?php echo $item['carteira']?><hr></h5>
                </br> 
                  <p class="text-left">                  
                  <?php echo $item['produto']?> </br>                  
                  <?php echo $item['arquivo']?> </br>
                  <?php echo $item['posicao']?> </br>
                  <?php echo $item['quartil']?> </br>
                  <?php echo $item['mes']?> </br>
                  <?php echo $item['ano']?>  </br>                 
                  </p>            
                <a href="<?php echo BASE_URL.'rankings/jur'; ?>" class="card-link">Ver detalhes</a>                
              </div>
            </div><!-- /.card -->           
          </div>
          <?php endforeach; ?> 
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      