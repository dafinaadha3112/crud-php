<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      DATA PENJUALAN MULTI ITEM
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">DATA PENJUALAN MULTI ITEM</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
      <a href="index.php?page=exel" class="btn btn-primary" role="button" title="Eksport Jual"><i class="glyphicon glyphicon-folder-open"></i> Eksport jual</a>
            <div class="box-body table-responsive">
              <table id="data_multi" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>ID JUAL</th>
                  <th>NAMA BARANG</th>
                  <th>HARGA</th>
                  <th>QUANTITY</th>
                  <th>TOTAL</th>
                  <th>TANGGAL</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                //$query=mysql_query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
                $query=mysqli_query($koneksi,
                "SELECT detail_jual.*, jual.tgl,barang.nama_barang 
                FROM detail_jual INNER JOIN jual 
                ON detail_jual.id_jual=jual.id 
                inner join barang on detail_jual.id_barang=barang.id
                ORDER BY detail_jual.id DESC")
                or die(mysqli_error($koneksi));
                while ($row=mysqli_fetch_array($query))
                {
                ?>

                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['id_jual'];?></td>
                  <td><?php echo $row['nama_barang'];?></td>
                  <td><?php echo $row['harga'];?></td>
                <td><?php echo $row['qty'];?></td>
                  <td><?php echo $row['total'];?></td>
                  <td><?php echo $row['tgl'];?></td>
                </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#data_multi').DataTable();
  });
</script>