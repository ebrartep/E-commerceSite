<?php 

include 'header.php'; 



$yorumsor=$db->prepare("SELECT * FROM yorumlar where yorum_id=:id");
$yorumsor->execute(array(
  'id' => $_GET['yorum_id']
  ));
$yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC);
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yorum Düzenleme <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
             
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

               <!-- Kategori seçme başlangıç -->


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $yorum_id=$yorumcek['kategori_id']; 

                  $kategorisor=$db->prepare("select * from kategori where kategori_ust=:kategori_ust order by kategori_sira");
                  $kategorisor->execute(array(
                    'kategori_ust' => 0
                    ));

                    ?>
                    <select class="select2_multiple form-control" required="" name="kategori_id" >


                     <?php 

                     while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

                       $kategori_id=$kategoricek['kategori_id'];

                       ?>

                       <option <?php if ($kategori_id==$yorum_id) { echo "selected='select'"; } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>


                 <!-- kategori seçme bitiş -->

            

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="yorum_ad" value="<?php echo $yorumcek['yorum_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

         
 <!-- Ck Editör Başlangıç -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Detay <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="yorum_detay"><?php echo $yorumcek['yorum_detay']; ?></textarea>
                </div>
              </div>

              <script type="text/javascript">

               CKEDITOR.replace( 'editor1',

               {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                forcePasteAsPlainText: true

              } 

              );

            </script>

            <!-- Ck Editör Bitiş -->



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Fiyat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="yorum_fiyat" value="<?php echo $yorumcek['yorum_fiyat'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


<div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Video <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="yorum_video" value="<?php echo $yorumcek['yorum_video'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Keyword <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="yorum_keyword" value="<?php echo $yorumcek['yorum_keyword'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Stok <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="yorum_stok" value="<?php echo $yorumcek['yorum_stok'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

          <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Öne Çıkar<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="yorum_onecikar" required>


                  <option value="1" <?php echo $yorumcek['yorum_onecikar'] == '1' ? 'selected=""' : ''; ?>>Evet</option>



                  <option value="0" <?php if ($yorumcek['yorum_onecikar']==0) { echo 'selected=""'; } ?>>Hayır</option>
                  <!-- <?php 

                   if ($yorumcek['yorum_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> -->




                 </select>
               </div>
             </div>

 <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="yorum_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $yorumcek['yorum_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->




                  <option value="1" <?php echo $yorumcek['yorum_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($yorumcek['yorum_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                </select>
</div>
</div>

             <input type="hidden" name="yorum_id" value="<?php echo $yorumcek['yorum_id'] ?>">



              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="yorumguncelle" class="btn btn-success">Güncelle</button>
                </div>
              </div>

            </form>



          </div>
        </div>
      </div>
    </div>



    <hr>
    <hr>
    <hr>



  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
