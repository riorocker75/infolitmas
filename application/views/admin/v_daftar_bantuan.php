
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Tugas Akhir</h1>
            <p>
            <span>Menampilakn syarat yang harus dipenuhi mahasiswa</span>
            </p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="float-right">
              <button class="btn btn-primary">Tambah daftar bantuan</button>
          </div>
        <br>
        <br>
      <!-- isi data daftar bantuan -->

      <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data-1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Syarat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td>1</td>
                    <td>Skripsi</td>
                    <td>
                      <p>Jenjang pendidikan D3-D4</p>
                      <p>Jumlah anggota 1-1</p>
                      <p>Range biaya pengajuan Rp. 1. -s.d Rp. 5.000.000,-</p>
                    </td>
                    <td>
                          <a href="<?php echo base_url().'admin/edit_bantuan'?>" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger">Hapus</a>
                      </td>
                   
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>Tesis</td>
                      <td>
                        <p>Jenjang pendidikan D3-D4</p>
                        <p>Jumlah anggota 1-1</p>
                        <p>Range biaya pengajuan Rp. 1. -s.d Rp. 5.000.000,-</p>
                      </td>
                      <td>
                          <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                  </tr>
                    

                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- end data bantuan -->


      </div>

    </section> 

    </div>