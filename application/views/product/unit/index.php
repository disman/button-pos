<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>Units
         <small>Satuan Barang</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class="active">Units</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Unit data</h3>
            <div class="pull-right">
               <a href="<?= site_url('unit/add'); ?>" class="btn btn-success btn-sm"> <i class="fa fa-user-plus"></i> Add unit</a>
            </div>
         </div>
         <div class="box-body table-responsive">
            <?php $this->view('message'); ?>
            <table id="dataTable" class="table table-bordered table-striped table-hover">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Name</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($unit->result() as $key => $row) : ?>
                     <tr>
                        <td style="width:5%"><?= $no++; ?></td>
                        <td><?= $row->name; ?></td>
                        <td class="text-center" width="160px">
                           <a href="<?= site_url('unit/edit/' . $row->unit_id); ?>" class="btn btn-primary btn-xs"><span class="fa fa-edit"></span> Edit</a>
                           <a onclick="return confirm('Are you sure?')" href="<?= site_url('unit/delete/' . $row->unit_id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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