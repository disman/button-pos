<?php if ($this->session->has_userdata('success')) : ?>
   <div class="alert alert-success" role="alert">
      <i class="icon fa fa-check"></i> <?= $this->session->flashdata('success'); ?>
   </div>
<?php endif; ?>
<?php if ($this->session->has_userdata('error')) : ?>
   <div class="alert alert-danger" role="alert">
      <i class="icon fa fa-ban"></i> <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error'))); ?>
   </div>
<?php endif; ?>