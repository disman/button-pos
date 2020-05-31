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
            <h3 class="box-title">Barcode generator <i class="fa fa-barcode"></i></h3>
            <div class="pull-right">
               <a href="<?= site_url('item/index'); ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
            </div>
         </div>
         <div class="box-body">
            <?php $this->view('message'); ?>
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($item->barcode, $generator::TYPE_CODE_128)) . '">';
            ?>
            <br>
            <?= $item->barcode; ?>
         </div>
      </div>
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">QR-Code Generator <i class="fa fa-qrcode"></i></h3>
         </div>
         <div class="box-body">
            <?php
            $qrCode = new Endroid\QrCode\QrCode($item->barcode);
            $qrCode->writeFile('images/qrcode/item-' . $item->barcode . '.png');
            ?>
            <img src="<?= base_url('images/qrcode/item-' . $item->barcode . '.png'); ?>" style="width:150px;">
            <br>
            <?= $item->barcode; ?>
         </div>
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->
</div>