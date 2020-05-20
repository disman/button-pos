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
            <h3 class="box-title"><?= ucfirst($page); ?> unit</h3>
            <div class="pull-right">
               <a href="<?= site_url('unit/index'); ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
            </div>
         </div>
         <div class="box-body">
            <div class="row">
               <div class="col-md-4 col-md-offset-2">
                  <form action="<?= site_url('unit/proccess'); ?>" method="POST">
                     <div class="form-group">
                        <label>Unit name <span class="text-red">*</span></label>
                        <input type="hidden" name="id" value="<?= $row->unit_id; ?>">
                        <input type="text" name="unit_name" value="<?= $row->name ?>" class="form-control" placeholder="Unit name" required>
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