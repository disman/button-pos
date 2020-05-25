<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>Items
         <small>Data barang</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class="active">Items</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="box">
         <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> product</h3>
            <div class="pull-right">
               <a href="<?= site_url('item/index'); ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
            </div>
         </div>
         <div class="box-body">
            <?php $this->view('message'); ?>
            <div class="row">
               <div class="col-md-4 col-md-offset-2">
                  <?php echo form_open_multipart('item/proccess'); ?>
                  <div class="form-group">
                     <label>Barcode <span class="text-red">*</span></label>
                     <input type="hidden" name="id" value="<?= $row->item_id; ?>">
                     <input type="text" name="barcode" value="<?= $row->barcode ?>" class="form-control" placeholder="Barcode item" required>
                  </div>
                  <div class="form-group">
                     <label>Product name <span class="text-red">*</span></label>
                     <input type="text" name="product_name" value="<?= $row->name ?>" class="form-control" placeholder="Product name" required>
                  </div>
                  <div class="form-group">
                     <label>Category <span class="text-red">*</span></label>
                     <select name="category" class="form-control">
                        <option value="">- Select Category-</option>
                        <?php foreach ($category->result() as $data) : ?>
                           <option value="<?= $data->category_id; ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>><?= $data->name; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Unit <span class="text-red">*</span></label>
                     <?php echo form_dropdown('unit', $unit, $selected_unit, ['class' => 'form-control', 'required' => 'required']) ?>
                  </div>
                  <div class="form-group">
                     <label>Price <span class="text-red">*</span></label>
                     <input type="number" name="price" value="<?= $row->price ?>" class="form-control" placeholder="Product price" required>
                  </div>
                  <div class="form-group">
                     <label>Image</label>
                     <?php if ($page == 'edit') {
                        if ($row->image != null) { ?>
                           <div style="margin-bottom: 5px">
                              <img src="<?= base_url('images/product/' . $row->image); ?>" style="width: 150px; height: 120px;">
                           </div>
                     <?php }
                     } ?>
                     <input type="file" name="image" class="form-control">
                     <small class="text-red">(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada gambar' ?>)</small>
                  </div>
                  <div class="form-group">
                     <button type="submit" name="<?= $page; ?>" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"> Save</i></button>
                     <button type="reset" class="btn btn-sm"><i class=""> Reset</i></button>
                  </div>
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->
</div>