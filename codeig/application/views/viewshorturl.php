<!DOCTYPE html>
 <html lang="en" class="no-js"> 
<head>
	<meta charset="utf-8">
	<?php  /*   this is the view that show the the fieldtext to enter in it the long  URL
   valid then send it by button then will come back the result which is url short 
   view in alink you can press in this link to go to your long uRL  */?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="" />
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	
	<link rel="stylesheet" href="/css/style.css?v=1">
</head>

<body>
	<div id="container">
		<h1>URL Shortener</h1>
		<section id="main">
		<?php

$this->load->helper('form');

echo form_open();
echo form_label('URL to Shorten', 'url');
echo form_input('url');
echo form_submit('shorty','Get Shorty');
echo form_close();

if(isset($short_url))
{
	echo '<a href="'.base_url().$short_url.'" target="_blank" class="shorty_url">'.base_url().$short_url.'</a>';
}

if(isset($error))
{
	echo '<div class="errors">'.$error.'</div>';
}
?>

		</section>

	</div>
</body>
</html>