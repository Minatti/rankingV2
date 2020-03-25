    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


          <form action="<?php echo BASE_URL; ?>permissions/items_add_action" method="POST">
            <!-- Default box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Novo<small>(s)</small> Itens de Permissões</h3>
                <div class="card-tools">
                  <input type="submit" class="btn btn-sm btn-default" value="Salvar"/>                
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="group_name">Descrição</label>
                  <input type="text" name="name" class="form-control <?php echo (in_array('name', $errorItems))?'is-invalid':''; ?>" id="group_name">
                  <span id="group_name" class="error invalid-feedback" style="">Por favor, insira a descrição</span>
                </div>
                <div class="form-group">
                  <label for="group_name">Nome Slug</label>
                  <input type="text" name="name_slug" class="form-control <?php echo (in_array('name', $errorItems))?'is-invalid':''; ?>" id="group_name" placeholder="tabela_acao">
                  <span id="group_name" class="error invalid-feedback" style="">Por favor, insira a descrição</span>
                </div>
                <div class="alert alert-danger col-sm-4">
                  Padrão: cart_create;
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




































