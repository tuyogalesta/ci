<?php 
  $this->load->view('template/head');
  $this->load->view('template/side',$template);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $template->title ?>      
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">  <?php echo $template->title ?>      </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- ALERT STATUS -->
        <?php if(!empty($this->session->flashdata('status'))){ ?>     
          <div class="alert <?php echo $this->session->flashdata('status') == 'error' ? 'alert-danger' : 'alert-success' ?>" role="alert"><?php echo $this->session->flashdata('text') ?></div>
        <?php } ?>
        <!-- END ALERT STATUS -->
        <div class="row">        
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><?php echo $template->title ?> </h3>                
              </div>
              <!-- /.box-header -->
              <div class="box-body">     
                <form action="<?=  base_url().$template->controller ?>/save" method="post" enctype="">
                  <?php 
                    foreach($form as $value){                   
                        echo Render::form($value);
                    }
                  ?>  
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th style="width: 20%">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tbody>
                        <?php foreach ($personil as $key => $value) : ?>
                          <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value->nama_personil ?></td>
                            <td><?php echo $value->jabatan ?></td>
                            <td>
                              <select name="detail[<?= $value->p_id ?>]" class="form-control">
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                <option value="Off">Off</option>
                              </select>
                            </td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </tbody>
                  </table>
                  <button class="btn btn-success">Simpan</button>                
                </form>           
              </div>
              <!-- /.box-body -->
            </div>
          </div>        
        </div>
    </section>
    <!-- /.content -->
  </div>  

<?php $this->load->view('template/footer') ?>
</body>
</html>