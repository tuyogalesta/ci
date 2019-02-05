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
        <li><a href="<?php echo base_url() ?>admin/home "><i class="fa fa-dashboard"></i> Home</a></li>
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
          <div class="col-xs-12 text-center" style="padding-top: 50px" >
            <img src="<?php echo base_url() ?>assets/logo.png" width="250 px" > <br>
            <font size="5px"><b>PT. Metropolitan Jaya Sukses</b> (cabang Bali)</font>
        </div>
          </div>  
    </section>
    <!-- /.content -->
  </div>  

<?php $this->load->view('template/footer') ?>
</body>
</html>