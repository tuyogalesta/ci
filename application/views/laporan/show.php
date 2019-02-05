<?php 
  $this->load->view('template/head');
  $this->load->view('template/side',$template);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $template->title ?> Data <?php echo $klien->nama_klien ?>      
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
                <h3 class="box-title">Laporan Tidak Hadir </h3>
                <form action="">
                    <div class="row">
                        
                    <div class="form-group col-md-2">
                        <select name="tahun" class="form-control" >
                            <?php for($i = 2017;$i <=2030;$i++): ?>
                            <option  <?php echo Render::selected_1($tahun,$i) ?> value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                    
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                
                    </div>
                </form>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="chart">
                    <canvas id="areaChart" style="height:250px"></canvas>
                </div>
                <h3>Tabel Detail</h3>
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Bulan</th>                                    
                    <th>Off</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Tanpa Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($list as $key => $row) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['bulan'] ?></td>                                    
                        <td><?php echo $row['off'] ?></td>
                        <td><?php echo $row['hadir'] ?></td>
                        <td><?php echo $row['sakit'] ?></td>
                        <td><?php echo $row['izin'] ?></td>
                        <td><?php echo $row['tanpa_keterangan'] ?></td>
                        
                      </tr> 
                    <?php } ?>
                  </tbody>              
                 
                </table>
                <h3>Personil Malas</h3>
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Personil</th>                                    
                    <th>Jumlah Tidak Hadir</th>                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($anggotaMalas as $key => $row) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_personil'] ?></td>                                    
                        <td><?php echo $row['tidak_hadir'] ?></td>
                      </tr> 
                    <?php } ?>
                  </tbody>              
                 
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>        
        </div>
    </section>
    <!-- /.content -->
  </div>  

<?php $this->load->view('template/footer') ?>
<script src="<?php echo base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
<script>
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChart       = new Chart(areaChartCanvas)
            var data = <?php echo $tidak_hadir ?> 

            

            var bulan = ['Januari','Februari','Maret','April','Mei',"Juni","Juli","Agustus","September","Oktober","Nopember","Desember"];

            var areaChartData = {
            labels  : bulan,
            datasets: [
                {
                    label               : 'Jumlah Bayi',
                    fillColor           : 'rgba(210, 214, 222, 1)',
                    strokeColor         : 'rgba(210, 214, 222, 1)',
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : data
                }
                
            ]
            }

            var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale               : true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines      : false,
            //String - Colour of the grid lines
            scaleGridLineColor      : 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth      : 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines  : true,
            //Boolean - Whether the line is curved between points
            bezierCurve             : true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension      : 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot                : false,
            //Number - Radius of each point dot in pixels
            pointDotRadius          : 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth     : 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius : 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke           : true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth      : 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill             : false,
            //String - A legend template
            legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio     : true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive              : true,
            multiTooltipTemplate    : "<%= datasetLabel %>: <%= value %>",
            legend                  : {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)'
                                        }
                                    }
            
            }

            //Create the line chart
            areaChart.Line(areaChartData, areaChartOptions)
</script>
</body>
</html>