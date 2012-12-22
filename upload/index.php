<?php
include ("../config.php");
session_start();
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Queued Photo Uploader - Standalone Showcase from digitarald.de</title>

	<meta name="author" content="Harald Kirschner, digitarald.de" />
	<meta name="copyright" content="Copyright 2009 Harald Kirschner" />

	<script type="text/javascript" src="source/mootools.js"></script>
	<script type="text/javascript" src="source/Swiff.Uploader.js"></script>
	<script type="text/javascript" src="source/Fx.ProgressBar.js"></script>
	<script type="text/javascript" src="source/Lang.js"></script>
	<script type="text/javascript" src="source/FancyUpload2.js"></script>


	<script type="text/javascript">
		//<![CDATA[

window.addEvent('domready', function() { // wait for the content

	// our uploader instance 
	
	var up = new FancyUpload2($('demo-status'), $('demo-list'), { // options object
		// we console.log infos, remove that in production!!
		verbose: false,
		
		// url is read from the form, so you just have to change one place
		url: $('form-demo').action,
		
		// path to the SWF file
		path: 'source/Swiff.Uploader.swf',
		
		// remove that line to select all files, or edit it, add more items
		typeFilter: {
			'Изображения (*.jpg, *.jpeg, *.gif, *.png)': '*.jpg; *.jpeg; *.gif; *.png'
		},
		
		// this is our browse button, *target* is overlayed with the Flash movie
		target: 'demo-browse',
		
		// graceful degradation, onLoad is only called if all went well with Flash
		onLoad: function() {
			$('demo-status').removeClass('hide'); // we show the actual UI
			$('demo-fallback').destroy(); // ... and hide the plain form
			
			// We relay the interactions with the overlayed flash to the link
			this.target.addEvents({
				click: function() {
					return false;
				},
				mouseenter: function() {
					this.addClass('hover');
				},
				mouseleave: function() {
					this.removeClass('hover');
					this.blur();
				},
				mousedown: function() {
					this.focus();
				}
			});

			// Interactions for the 2 other buttons
			
			$('demo-clear').addEvent('click', function() {
				up.remove(); // remove all files
				return false;
			});

			$('demo-upload').addEvent('click', function() {
				up.start(); // start upload
				return false;
			});
		},
		
		// Edit the following lines, it is your custom event handling
		
		/**
		 * Is called when files were not added, "files" is an array of invalid File classes.
		 * 
		 * This example creates a list of error elements directly in the file list, which
		 * hide on click.
		 */ 
		onSelectFail: function(files) {
			files.each(function(file) {
				new Element('li', {
					'class': 'validation-error',
					html: file.validationErrorMessage || file.validationError,
					title: MooTools.lang.get('FancyUpload', 'removeTitle'),
					events: {
						click: function() {
							this.destroy();
						}
					}
				}).inject(this.list, 'top');
			}, this);
		},
		
		/**
		 * This one was directly in FancyUpload2 before, the event makes it
		 * easier for you, to add your own response handling (you probably want
		 * to send something else than JSON or different items).
		 */
		onFileSuccess: function(file, response) {
			var json = new Hash(JSON.decode(response, true) || {});
			
			if (json.get('status') == '1') {
				file.element.addClass('file-success');
				file.info.set('html', '<strong>Информация о файле:</strong> ' + json.get('width') + ' x ' + json.get('height') + 'px<br>Новое имя файла: ' + json.get('new') + '');
			} else {
				file.element.addClass('file-failed');
				file.info.set('html', '<strong>Ошибка:</strong> ' + json.get('error'));
			}
		},
		
		/**
		 * onFail is called when the Flash movie got bashed by some browser plugin
		 * like Adblock or Flashblock.
		 */
		onFail: function(error) {
			switch (error) {
				case 'hidden': // works after enabling the movie and clicking refresh
					alert('To enable the embedded uploader, unblock it in your browser and refresh (see Adblock).');
					break;
				case 'blocked': // This no *full* fail, it works after the user clicks the button
					alert('To enable the embedded uploader, enable the blocked Flash movie (see Flashblock).');
					break;
				case 'empty': // Oh oh, wrong path
					alert('A required file was not found, please be patient and we fix this.');
					break;
				case 'flash': // no flash 9+ :(
					alert('To enable the embedded uploader, install the latest Adobe Flash plugin.')
			}
		}
		
	});
	
});
		//]]>
	</script>
<link rel="stylesheet" type="text/css" href="source/styles.css">

<style>
    body {
        background: #eee;
    }
</style>

</head>
<body>

<?php

    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
        echo "Вы не авторизованы, <a href='../index.php'>Авторизоваться</a>";
}
    else
    {
// *********GROUP_ACCESS*********
$username = $_SESSION['login']; 
$sql = "SELECT * FROM `users` WHERE login='$username'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");
$row = mysql_fetch_assoc($result);
$group =  $row['group_id'];
$group = intval($group);
if ($group == 0) { $gt = '<b>Студенты<b>'; $grac = 'Вы можете читать/скачивать книги'; }
if ($group == 1) { $gt = '<b><font color="orange">Модераторы</font></b>'; $grac = '<b><font color="orange">Полный доступ без права загрузки файлов на сервер</font></b>'; }
if ($group == 2) { $gt = '<b><font color="red">Администраторы</font></b>'; $grac = '<b><font color="red">Полный доступ</font></b>'; }
if ($group<2){
    echo "<a href='../index.php'><b>На Главную</b></a><br/><br/><b>Ваша группа: </b>" . $gt . ", У Вас нет привилегий в эту часть ресурса. <br/><b>Ваши привилегии: </b>" . $grac . "<br/><br/>";
}
	
else {
// *********GROUP_ACCESS*********
echo '
<b><a href="../index.php">На Главную</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../logout.php">Выход</a></b><br/><br/>
	<div class="container">


		<!-- See index.html -->
		<div>
			<form action="server/script.php" method="post" enctype="multipart/form-data" id="form-demo">

	<fieldset id="demo-fallback">
		<legend>Загрузить изображения</legend>
		<p>
			В вашем браузере отключено выполнение JavaScript. Для корректной работы требуется включить JavaScript.
		</p>
		<label for="demo-photoupload">
			Загрузить фото:
			<input type="file" name="Filedata" />
		</label>
	</fieldset>

	<div id="demo-status" class="hide">
		<p>
			<a href="#" id="demo-browse">Выбрать файлы</a> |
			<a href="#" id="demo-clear">Очистить список</a> |
			<a href="#" id="demo-upload">Начать загрузку</a>
		</p>
		<div>
			<strong class="overall-title"></strong><br />
			<img src="assets/progress-bar/bar.gif" class="progress overall-progress" />
		</div>
		<div>
			<strong class="current-title"></strong><br />
			<img src="assets/progress-bar/bar.gif" class="progress current-progress" />
		</div>
		<div class="current-text"></div>
	</div>

	<ul id="demo-list"></ul>

</form>
</div>


	</div>

	<div class="container quiet" style="line-height: 5em;"></div>';

 } 
		}
?>

</body>
</html>