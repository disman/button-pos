<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>Stock in
         <small>Barang masuk / pembelian</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li>Transaction</li>
         <li class="active">Stock in</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Add stock in</h3>
            <div class="pull-right">
               <a href="<?= site_url('stock/in'); ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
            </div>
         </div>
         <div class="box-body">
            <?php $this->view('message'); ?>
            <div class="row">
               <div class="col-md-4 col-md-offset-2">
                  <form action="<?= site_url('stock/proccess'); ?>" method="POST">
                     <div class="form-group">
                        <label>Date <span class="text-red">*</span></label>
                        <input type="date" name="date" value="<?= date('Y-m-d'); ?>" class="form-control" placeholder="Date" required>
                     </div>
                     <div>
                        <label for="barcode">Barcode <span class="text-red">*</span></label>
                     </div>
                     <div class="form-group input-group">
                        <input type="hidden" name="item_id" id="item_id">
                        <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                        <span class="input-group-btn">
                           <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-item">
                              <i class="fa fa-search"></i>
                           </button>
                        </span>
                     </div>
                     <div class="form-group">
                        <label for="item_name">Item name</label>
                        <input type="text" id="item_name" name="item_name" class="form-control" readonly>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-8">
                              <label for="unit_item">Item unit</label>
                              <input type="text" id="unit_name" name="unit_name" value="-" class="form-control" readonly>
                           </div>
                           <div class="col-md-4">
                              <label for="stock">Initial stock</label>
                              <input name="text" name="stock" id="stock" class="form-control" value="-" readonly>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="detail">Detail <span class="text-red">*</span></label>
                        <input type="text" id="detail" name="detail" class="form-control" placeholder="Kulakan / Tambahan / etc" required>
                     </div>
                     <div class="form-group">
                        <label for="detail">Supplier <span class="text-red">*</span></label>
                        <select name="supplier" class="form-control">
                           <option value="">- Select Supplier -</option>
                           <?php
                           foreach ($supplier as $row) {
                              echo '<option value="' . $row->supplier_id . '">' . $row->name . '</option>';
                           }
                           ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="qty">Qty <span class="text-red">*</span></label>
                        <input type="text" id="qty" name="qty" class="form-control" placeholder="Qty" required>
                     </div>
                     <div class="form-group">
                        <button type="submit" name="in_add" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-sm"><i class=""> Reset</i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->
</div>

<div class="modal fade" id="modal-item">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Select product item</h4>
         </div>
         <div class="modal-body table-responsive">
            <table class="table table-bordered table-striped" id="dataTable">
               <thead>
                  <tr>
                     <th>barcode</th>
                     <th>Name</th>
                     <th>Unit</th>
                     <th>Price</th>
                     <th>Stock</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($item as $i => $row) : ?>
                     <tr>
                        <td><?= $row->barcode; ?></td>
                        <td><?= $row->name; ?></td>
                        <td><?= $row->unit_name; ?></td>
                        <td><?= indo_currency($row->price); ?></td>
                        <td><?= $row->stock; ?></td>
                        <td>
                           <button class="btn btn-primary btn-xs" id="select" data-id="<?= $row->item_id; ?>" data-barcode="<?= $row->barcode; ?>" data-name="<?= $row->name; ?>" data-unit="<?= $row->unit_name; ?>" data-stock="<?= $row->stock; ?>">
                              <i class="fa fa-check"></i> Select
                           </button>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>