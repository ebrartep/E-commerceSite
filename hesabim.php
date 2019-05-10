<?php include 'header.php';

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['userkullanici_mail']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p >Bilgilerinizi aşağıdan düzenleyebilirsiniz...</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Kayıt Bilgileri</div>
				</div>

				<?php 

				if ($_GET['durum']=="farklisifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
				</div>
					
				<?php } elseif ($_GET['durum']=="eksiksifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
				</div>
					
				<?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
				</div>
					
				<?php } elseif ($_GET['durum']=="basarisiz") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
				</div>
					
				<?php }
				 ?>


				


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"   name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>" required="required">
					</div>
					
				</div>
						<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"   name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il'] ?>" required="required">
					</div>
					
				</div>
						<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"   name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce'] ?>" required="required">
					</div>
					
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control" name="kullanici_mail" disabled="" value="<?php echo $kullanicicek['kullanici_mail'] ?>" required="required">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" disabled="" name="kullanici_passwordone"    placeholder="Şifrenizi Giriniz...">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" disabled="" name="kullanici_passwordtwo"   placeholder="Şifrenizi Tekrar Giriniz...">
					</div>
				</div>

 <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">

				<button type="submit" name="kullaniciduzenle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				<center><a href="sifre-guncelle"><img width="400" src="http://www.emrahyuksel.com.tr/dimg/sifremi-unuttum.jpg"></a></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>