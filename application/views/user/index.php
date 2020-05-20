<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>Users
         <small>Pengguna/Karyawan</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class="active">Users</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">User data</h3>
            <div class="pull-right">
               <a href="<?= site_url('user/add'); ?>" class="btn btn-success btn-sm"> <i class="fa fa-user-plus"></i> Create</a>
            </div>
         </div>
         <div class="box-body table-responsive">
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-bordered table-striped table-hover">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Username</th>
                     <th>Name</th>
                     <th>Address</th>
                     <th>Level</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($user->result() as $key => $row) : ?>
                     <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->username; ?></td>
                        <td><?= $row->name; ?></td>
                        <td><?= $row->address; ?></td>
                        <td><?= $row->level == 1 ? "Admin" : "Kasir"; ?></td>
                        <td class="text-center" width="160px">
                           <a href="<?= site_url('user/edit/' . $row->user_id); ?>" class="btn btn-primary btn-xs"><span class="fa fa-edit"></span> Edit</a>
                           <a onclick="return confirm('Are you sure?')" href="<?= site_url('user/delete/' . $row->user_id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->
</div>