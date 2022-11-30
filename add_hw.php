<?php
session_start();
?>
<link rel="stylesheet" href="2.css">

<script>
$('.input-file input[type=file]').on('change', function(){
	let file = this.files[0];
	$(this).closest('.input-file').find('.input-file-text').html(file.name);
});
</script>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form enctype="multipart/form-data" class="send__hw" method="post" action="add_hw.php">
				<span class="homework__text"><h1>Submit homework</h1></span>
				
				<div class="id__text__div">
					<span class="id__text">Specify the homework id</span>
				</div>
				<div class="id__field">
					<input type="text" name="id" class="id__input" placeholder="Homework id">
				</div>
				<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
				<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
				<span class="send__text">Attach file with homework</span>
				<br>
				<br>
				
				<label class="input-file">
					<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
					
					<input name="userfile" type="file"/>      
					<span class="input-file-btn">Choose file</span>
					<span class="input-file-text"></span>
					<br>
					<br>
					<span class="send__hw_oao">Send your homework</span>
					<br>
					<br>
					<input type="submit" value="Send file"/>
				</label>
		
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>	
	</div>
</div>
<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script>
/*$('.input-file input[type=file]').on('change', function(){
	let file = this.files[0];
	$(this).closest('.input-file').find('.input-file-text').html(file.name);
});*/
</script>
<?php

if($_POST){
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . rand(0,1000000) . basename($_FILES['userfile']['name']);
    
    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
    
    print "</pre>";
    $dbh = new PDO('mysql:host=85.193.80.157; port=3306; dbname=default_db', 'gen_user', 'Qazwsx23e47');
    $id_hw = $_POST["id"];
    
    $id_user = $_SESSION["id"];
    $dbh->query("INSERT INTO `homeworks` (`id_user`, `id_hw`, `file`) VALUES ($id_user, $id_hw, \"$uploadfile\") ");
}


?>
