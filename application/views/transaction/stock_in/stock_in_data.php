<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>stock in
         <small>Barang masuk</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li><a href="<?php echo site_url('stock/in') ?>">Transaction</a></li>
         <li class="active">Stock in data</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Stock in data</h3>
            <div class="pull-right">
               <a href="<?= site_url('stock/in/add'); ?>" class="btn btn-success btn-sm"> <i class="fa fa-user-plus"></i> Add stock in</a>
            </div>
         </div>
         <div class="box-body table-responsive">
            <?php $this->view('message'); ?>
            <table id="dataTable" class="table table-bordered table-striped table-hover">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Barcode</th>
                     <th>Product item</th>
                     <th>Qty</th>
                     <th>Date</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($stock_in as $key => $row) : ?>
                     <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->barcode; ?></td>
                        <td><?= $row->supplier_name; ?></td>
                        <td class="text-right"><?= $row->qty; ?></td>
                        <td class="text-center"><?= indo_date($row->date); ?></td>
                        <td class="text-center" width="160px">
                           <a href="#" class="btn btn-default btn-xs"><span class="fa fa-eye"></span> Detail</a>
                           <a onclick="return confirm('Are you sure?')" href="<?= site_url('stock/in/delete/' . $row->stock_id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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