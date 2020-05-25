<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>Customers
         <small>Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class="active">Customers</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="box">
         <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> customer</h3>
            <div class="pull-right">
               <a href="<?= site_url('customer'); ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
            </div>
         </div>
         <div class="box-body">
            <?php $this->view('message'); ?>
            <div class="row">
               <div class="col-md-4 col-md-offset-2">
                  <form action="<?= site_url('customer/proccess'); ?>" method="POST">
                     <div class="form-group">
                        <label>Customer name <span class="text-red">*</span></label>
                        <input type="hidden" name="id" value="<?= $row->customer_id; ?>">
                        <input type="text" name="customer_name" value="<?= $row->name ?>" class="form-control" placeholder="Customer name" required>
                     </div>
                     <div class="form-group">
                        <label>Gender <span class="text-red">*</span></label>
                        <select name="gender" class="form-control" required>
                           <option value="">- Select -</option>
                           <option value="L" <?= $row->gender == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                           <option value="P" <?= $row->gender == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Phone <span class="text-red">*</span></label>
                        <input type="number" name="phone" value="<?= $row->phone ?>" class="form-control" placeholder="Phone" required>
                     </div>
                     <div class="form-group">
                        <label>Address <span class="text-red">*</span></label>
                        <textarea name="addr" class="form-control" placeholder="Address" required><?= $row->address ?></textarea>
                     </div>
                     <div class="form-group">
                        <button type="submit" name="<?= $page; ?>" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"> Save</i></button>
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