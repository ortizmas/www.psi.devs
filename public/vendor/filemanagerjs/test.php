<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<textarea name="conteudo" cols="100" rows="20"></textarea>

	

	<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->
	<!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script> -->
	<!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=fkczcxnlv53w329ddjwk4zeikgwenyay0wc1qlzy4bhlfunt"></script> -->
	<script src="tinymce/tinymce.min.js" type="text/javascript"></script>
	<script>
		var BASE_URL = "http://localhost/filemanagerbest/"; // use your own base url
		tinymce.init({
			selector: "textarea",
			// theme: "modern",width: 1200,height: 60,
			relative_urls: false,
        	remove_script_host: false,
			plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
			"table contextmenu directionality emoticons paste responsivefilemanager textcolor code"
			],
			toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
			toolbar2: "| link unlink anchor | responsivefilemanager | image media | forecolor backcolor  | print preview code ",
			image_advtab: true,
			relative_urls: false,
			// external_filemanager_path: BASE_URL + "./filemanager/",
			// filemanager_title:"Responsive Filemanager",
			// external_plugins: { "filemanager" : BASE_URL + "./filemanager/plugin.min.js"},

			external_filemanager_path: BASE_URL + "filemanager/",
        	filemanager_title: "Media Gallery",
        	external_plugins: { "filemanager": BASE_URL + "filemanager/plugin.min.js" }

		});
	</script> 
</body>
</html>