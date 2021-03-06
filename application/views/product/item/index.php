<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>Items
         <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li><a href="<?php echo site_url('item') ?>">Product</a></li>
         <li class="active">Items</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Data product item</h3>
            <div class="pull-right">
               <a href="<?= site_url('item/add'); ?>" class="btn btn-success btn-sm"> <i class="fa fa-user-plus"></i> Add product item</a>
            </div>
         </div>
         <div class="box-body table-responsive">
            <?php $this->view('message'); ?>
            <table id="dataTable" class="table table-bordered table-striped table-hover">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Barcode</th>
                     <th>Image</th>
                     <th>Product name</th>
                     <th>Category</th>
                     <th>Unit</th>
                     <th>Price</th>
                     <th>Stock</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($item->result() as $key => $row) : ?>
                     <tr>
                        <td style="width:5%"><?= $no++; ?></td>
                        <td>
                           <?= $row->barcode; ?>
                           <a href="<?php echo site_url('item/barcode_generator/' . $row->item_id) ?>" class="btn btn-default btn-xs"><i class="fa fa-barcode"> Generate</i></a>
                        </td>
                        <td>
                           <?php if ($row->image != null) { ?>
                              <img src="<?= base_url('images/product/' . $row->image); ?>" style="width: 80px; height: 60px;">
                           <?php } else { ?>
                              <img src="<?= base_url('images/product/default.jpg'); ?>" style="width: 80px; height: 60px;">
                           <?php } ?>
                        </td>
                        <td><?= $row->name; ?></td>
                        <td><?= $row->category_name; ?></td>
                        <td><?= $row->unit_name; ?></td>
                        <td><?= $row->price; ?></td>
                        <td><?= $row->stock; ?></td>
                        <td class="text-center" width="160px">
                           <a href="<?= site_url('item/edit/' . $row->item_id); ?>" class="btn btn-primary btn-xs"><span class="fa fa-edit"></span> Edit</a>
                           <a onclick="return confirm('Are you sure?')" href="<?= site_url('item/delete/' . $row->item_id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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