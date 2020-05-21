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
            <h3 class="box-title">Add user</h3>
            <div class="pull-right">
               <a href="<?= site_url('user/index'); ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
            </div>
         </div>
         <div class="box-body">
            <?php $this->view('message'); ?>
            <div class="row">
               <div class="col-md-4 col-md-offset-2">
                  <form action="" method="POST">
                     <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                        <label for="name">Full name *</label>
                        <input type="text" name="fullname" value="<?= set_value('fullname'); ?>" class="form-control" placeholder="Full name">
                        <?= form_error('fullname'); ?>
                     </div>
                     <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                        <label for="username">Username *</label>
                        <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Username">
                        <?= form_error('username'); ?>
                     </div>
                     <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                        <label for="password">Password *</label>
                        <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" placeholder="Password">
                        <?= form_error('password'); ?>
                     </div>
                     <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                        <label for="username">Password Confirmation *</label>
                        <input type="password" name="passconf" class="form-control" placeholder="Password confirmation">
                        <?= form_error('passconf'); ?>
                     </div>
                     <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" placeholder="Address"><?= set_value('address'); ?></textarea>
                     </div>
                     <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                        <label for="level">Level *</label>
                        <select name="level" class="form-control">
                           <option value="">-- Select Level --</option>
                           <option value="1">Admin</option>
                           <option value="2">Kasir</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"> Save</i></button>
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