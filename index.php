<?php
// George Hea Diep
// Mass content production

// magic quotes causing escape slashes to appear in all ' and " 
// turn off magic quotes on BCM server
// http://www.php.net/manual/en/security.magicquotes.disabling.php
if (get_magic_quotes_gpc()) {
		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
		while (list($key, $val) = each($process)) {
			foreach ($val as $k => $v) {
				unset($process[$key][$k]);
				if (is_array($v)) {
					$process[$key][stripslashes($k)] = $v;
					$process[] = &$process[$key][stripslashes($k)];
				} else {
					$process[$key][stripslashes($k)] = stripslashes($v);
				}
			}
		}
	unset($process);
}

function csreplace(){

if (isset($_POST['submit'])) {

$city = isset($_POST['cities[]']);
$cityinput = $_POST['cityinput'];
$state = $_POST['state'];
$template_title = $_POST['template_title'];
$template_url = $_POST['template_url'];
$template_titletag = $_POST['template_titletag'];
$template_meta = $_POST['template_meta'];
$template = $_POST['template'];
$submit = $_POST['submit'];

$cityseparate = explode(",", $cityinput);

$other_replacement1 = $_POST['other_replacement1'];
$other_replacement2 = $_POST['other_replacement2'];


	if (isset($_POST['cities'])) {
		// Print fields for every city 
		foreach ($_POST['cities'] as $cityselect)
		{
			print "<div id='$cityselect'>";
			print "<h4 for='$cityselect'>$cityselect, $state</h4>";


			// Title
			$geotitle = str_replace("{city}", $cityselect, $template_title);
			$geotitle = str_replace("{state}", $state, $geotitle);
			$geotitle = str_replace("{replace1}", $other_replacement1, $geotitle);
			$geotitle = str_replace("{replace2}", $other_replacement2, $geotitle);
			print "<label for='$cityselect-title'>Title:</label>";
			print "<input name='template_title' id='$cityselect-title' type='text' value='$geotitle' />";


			// Optimized URL. Lowercases the string if necessary
			$geourl = str_replace("{city}", $cityselect, $template_url);
			$geourl = str_replace("{state}", $state, $geourl);
			$geourl = str_replace("{replace1}", $other_replacement1, $geourl);
			$geourl = str_replace("{replace2}", $other_replacement2, $geourl);
			$geourl = str_replace(",", '', $geourl);
			$geourl = str_replace("'", '', $geourl);
			$geourl = str_replace(" ", '-', $geourl);
			$geourl = strtolower($geourl);
			print "<label for='$cityselect-url'>Optimized URL:</label>";
			print "<input name='template_url' id='$cityselect-url' type='text' value='$geourl' />";


			// Title tag
			$geotitletag = str_replace("{city}", $cityselect, $template_titletag);
			$geotitletag = str_replace("{state}", $state, $geotitletag);
			$geotitletag = str_replace("{replace1}", $other_replacement1, $geotitletag);
			$geotitletag = str_replace("{replace2}", $other_replacement2, $geotitletag);
			print "<label for='$cityselect-titletag'>Title Tag:</label>";
			print "<input name='template_titletag' id='$cityselect-titletag' type='text' value='$geotitletag' />";


			// Meta description
			$geometa = str_replace("{city}", $cityselect, $template_meta);
			$geometa = str_replace("{state}", $state, $geometa);
			$geometa = str_replace("{replace1}", $other_replacement1, $geometa);
			$geometa = str_replace("{replace2}", $other_replacement2, $geometa);
			print "<label for='$cityselect-meta'>Meta Description:</label>";
			print "<input name='template_meta' id='$cityselect-meta' type='text' value='$geometa' />";


			// Optimized template
			$geopage = str_replace("{city}", $cityselect, $template);
			$geopage = str_replace("{state}", $state, $geopage);
			$geopage = str_replace("{replace1}", $other_replacement1, $geopage);
			$geopage = str_replace("{replace2}", $other_replacement2, $geopage);
			// magic quotes enabled on BCM server->following removes it
			//$geopage = str_replace(array('"', "'"), '', stripslashes($geopage));

			print "<label for='$cityselect-body'>Body Template:</label>";
			print "<textarea id='$cityselect-body' readonly>";
				print $geopage;
			//print $_POST['cities[]'];
			print "</textarea>"; print "<br />"; print "<br />";

			//Output the file
			$output_file = file_put_contents($geourl . '.html', $geopage . "\n");

			// Append additional items
			// Cityname
			$output_file = file_put_contents($geourl . '.html', "<div class='cityname' style='display: none;'>$cityselect, $state</div>\n", FILE_APPEND);

			$output_file = file_put_contents($geourl . '.html', "<div class='custom_permalink' style='display: none;'>" . $other_replacement2 . $geourl . "</div>\n", FILE_APPEND);



			print " File: <a href='" . $geourl . ".html'>" . $geourl . ".html</a>";

			print "</div>";
			print "<hr />";
		}
	
	}

	// Print fields for every city 



	if (isset($_POST['cityinput'])) {
		foreach ($cityseparate as $cityinputs)
		{
			print "<div id='$cityinputs'>";
			print "<h4 for='$cityinputs'>$cityinputs, $state</h4>";


			// Title
			$geotitle = str_replace("{city}", $cityinputs, $template_title);
			$geotitle = str_replace("{state}", $state, $geotitle);
			$geotitle = str_replace("{replace1}", $other_replacement1, $geotitle);
			$geotitle = str_replace("{replace2}", $other_replacement2, $geotitle);
			print "<label for='$cityinputs-title'>Title:</label>";
			print "<input name='template_title' id='$cityinputs-title' type='text' value='$geotitle' />";


			// Optimized URL. Lowercases the string if necessary
			$geourl = str_replace("{city}", $cityinputs, $template_url);
			$geourl = str_replace("{state}", $state, $geourl);
			$geourl = str_replace("{replace1}", $other_replacement1, $geourl);
			$geourl = str_replace("{replace2}", $other_replacement2, $geourl);
			$geourl = str_replace(",", '', $geourl);
			$geourl = str_replace("'", '', $geourl);
			$geourl = str_replace(" ", '-', $geourl);
			$geourl = strtolower($geourl);
			print "<label for='$cityinputs-url'>Optimized URL:</label>";
			print "<input name='template_url' id='$cityinputs-url' type='text' value='$geourl' />";


			// Title tag
			$geotitletag = str_replace("{city}", $cityinputs, $template_titletag);
			$geotitletag = str_replace("{state}", $state, $geotitletag);
			$geotitletag = str_replace("{replace1}", $other_replacement1, $geotitletag);
			$geotitletag = str_replace("{replace2}", $other_replacement2, $geotitletag);
			print "<label for='$cityinputs-titletag'>Title Tag:</label>";
			print "<input name='template_titletag' id='$cityinputs-titletag' type='text' value='$geotitletag' />";


			// Meta description
			$geometa = str_replace("{city}", $cityinputs, $template_meta);
			$geometa = str_replace("{state}", $state, $geometa);
			$geometa = str_replace("{replace1}", $other_replacement1, $geometa);
			$geometa = str_replace("{replace2}", $other_replacement2, $geometa);
			print "<label for='$cityinputs-meta'>Meta Description:</label>";
			print "<input name='template_meta' id='$cityinputs-meta' type='text' value='$geometa' />";


			// Optimized template
			$geopage = str_replace("{city}", $cityinputs, $template);
			$geopage = str_replace("{state}", $state, $geopage);
			$geopage = str_replace("{replace1}", $other_replacement1, $geopage);
			$geopage = str_replace("{replace2}", $other_replacement2, $geopage);
			// magic quotes enabled on BCM server->following removes it
			//$geopage = str_replace(array('"', "'"), '', stripslashes($geopage));

			print "<label for='$cityinputs-body'>Body Template:</label>";
			print "<textarea id='$cityinputs-body' readonly>";
				print $geopage;
			//print $_POST['cities[]'];
			print "</textarea>"; print "<br />"; print "<br />";

			//Output the file
			$output_file = file_put_contents($geourl . '.html', $geopage . "\n");

			// Append additional items
			// Cityname
			$output_file = file_put_contents($geourl . '.html', "<div class='cityname' style='display: none;'>$cityinputs, $state</div>\n", FILE_APPEND);

			$output_file = file_put_contents($geourl . '.html', "<div class='custom_permalink' style='display: none;'>" . $other_replacement2 . $geourl . "</div>\n", FILE_APPEND);



			print " File: <a href='" . $geourl . ".html'>" . $geourl . ".html</a>";

			print "</div>";
			print "<hr />";
		}
	}

	} else {
		print '<p>Enter required information.</p>';
	}

	//print '<pre>';print_r($_POST);print '</pre>';

	if (isset($_POST['submit'])) {
		print "<h4 for='optimized_urls'>Optimized URLs Created</h4>";
		print '<textarea id="optimized_urls" name="optimized_urls"></textarea>';
	}


	}


function hideInput(){

	if (isset($_POST['submit'])) {
		print '
			<style type="text/css" media="screen">

				#hideInput {
					display: block;
				}
			</style>
		';
	}
}

////////////////////

function csgenerator(){
	csreplace();
}




?>

<html>
<head>
	<title>City State Generator</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<?php
		hideInput();
 	?>

	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>



	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-31310990-1', 'georgediep.com');
	  ga('send', 'pageview');

	</script>


</head>
<body>
<button id="hideInput" type="button">Show/Hide Input</button>

<h1>City State Generator</h1>


<div id="release-notes">
	<?php include 'includes/release-notes.php'; ?>
</div>


<hr>  
	<h2>Directions</h2>
	<p>Enter all necessary information your geopage requires. The document provided has all the required information.</p>
	<p>Select the client you are making content for...</p>
	<p>For each region, you may click all cities in the region, or click individual cities to create content.</p>
	<p><span style="color: #ff0000; font-weight: bold; font-size: 200%;">OR</span></p>
	<p>Add comma separated cities in the textarea.</p>
	<p><span style="color:red;">Important!</span> Be sure to click the state that the city belongs to in the State selection field.
	<p>Replace all instances of <strong>City</strong> with <strong>{city}</strong> and <strong>State</strong> with <strong>{state}</strong> for your replacement pattern.</p>
	<p>For additional replacement patterns, use <strong>{replace1}</strong> and <strong>{replace2}</strong>. Useful for things like counties.</p>
	<p>You might need to add individual HTML tags to your document before submitting to create content.</p>


	<div id="input" class="left" style="width:49%; margin-right:1%;">


	<form action="index.php#output" method="POST">
	<label>Select Client:</label><br>
		<?php include 'includes/client-list.php'; ?>





		<div class="left" style="margin-right: 1%;">

			<label for="city">Cities:</label><br>


			<?php include 'includes/client-hubs.php'; ?>
		<div class="clear"></div>
			<label for="other-city">Comma Separated Cities:</label>
			<textarea style="height: 100px;" id="comma-separated" name="cityinput" placeholder="Enter comma separated cities..."></textarea>
		</div>
		<div class="right" style="margin-left: 1%;">
			<label for="state">State:</label>
			<br>
			<?php include 'includes/states-list.php'; ?>
		</div>
		<div class="right" style="margin-left: 1%;">
			<label for="other-replacement1">Other Replacement Value:</label>
			<br>
			<input type="text" name="other_replacement1" value="" placeholder="Replacement value 1">
			<input type="text" name="other_replacement2" value="" placeholder="Replacement value 2">
		</div>

		<div class="clear"></div>
		<br>

		<label for="template-title">Title:</label>
		<br>
		<input type="text" id="template-title" name="template_title" placeholder="Enter your title." />
		<br>

		<label for="template-url">Optimized URL:</label>
		<br>
		<input type="text" id="template-url" name="template_url" placeholder="Enter your URL." />
		<br>		

		<label for="template-titletag">Title Tag:</label>
		<br>
		<input type="text" id="template-titletag" name="template_titletag" placeholder="Enter your title tag." />
		<br>

		<label for="template-meta">Meta Description:</label>
		<br>
		<input type="text" id="template-meta" name="template_meta" placeholder="Enter your meta description." />
		<br>


		<label for="template">Body Template:</label>
		<br>
		<textarea id="template" name="template" placeholder="{city} to replace your City placeholder. {state} to replace your State."></textarea>
		<br>
		<input type="submit" name="submit">
	</form>
	</div>
	<div id="output" class="left" style="width:49%; margin-left:1%;">
		<label for="output">Output:</label>
		<br />


	<?php
				csgenerator();
	?>


	</div>
	<div style="clear both;"></div>

</body>
</html>

