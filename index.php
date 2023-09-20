<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Client web</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="icon" type="image/png" href="images/favicon.png" />
</head>

<body>

	<?php

	$url = null;
	$method = "POST";
	$parameters = null;

	if (!empty($_POST["url"])) $url = $_POST["url"];
	if (!empty($_POST["method"])) $method = $_POST["method"];
	if (!empty($_POST["parameters"])) $parameters = $_POST["parameters"];

	?>

	<div class="container-form">
		<form method="POST" action="index.php">
			<div class="form-line">
				<label class="form-label">URL :</label>
				<input name="url" type="text" class="form-field" value="<?php echo $url; ?>">
			</div>
			<div class="form-line">
				<label class="form-label">Méthode d'envoi :</label>
				<select name="method" class="form-field">
					<option value="POST" <?php if ($method == "POST") echo "selected"; ?>>POST</option>
					<option value="GET" <?php if ($method == "GET") echo "selected"; ?>>GET</option>
					<option value="DELETE" <?php if ($method == "DELETE") echo "selected"; ?>>DELETE</option>
					<option value="PUT" <?php if ($method == "PUT") echo "selected"; ?>>PUT</option>
				</select>
			</div>
			<div class="form-line">
				<label class="form-label">Paramètres corps requête :</label>
				<textarea name="parameters" id="parameters_box" class="form-field form-textarea"><?php echo $parameters; ?></textarea>
			</div>
			<div class="container-submit">
				<input class="submit-button" type="submit">
			</div>
		</form>
	</div>

	<div class="container-form">


		<?php

		include_once("tools/RequestSender.php");

		if (!empty($_POST["url"]) && !empty($_POST["method"])) {

			switch ($_POST["method"]) {
				case "GET":
					$response = RequestSender::sendGetRequest($_POST["url"]);
					break;

				case "POST":
					$data = null;
					if (!empty($_POST["parameters"])) {
						$data = $_POST["parameters"];
					}
					$data = json_decode($data);
					$response = RequestSender::sendPostRequest($_POST["url"], $data);
					break;

				case "PUT":
					$data = null;
					if (!empty($_POST["parameters"])) {
						$data = $_POST["parameters"];
					}
					$data = json_decode($data);
					$response = RequestSender::sendPutRequest($_POST["url"], $data);
					break;

				case "DELETE":
					$response = RequestSender::sendDeleteRequest($_POST["url"]);
					break;

				default:
					break;
			}

			if (!empty($response)) {
				if (!empty($response["status_code_header"])) {
					echo '<div class="http_code">' . $_SERVER['SERVER_PROTOCOL'] . ' ' . $response["status_code_header"] . '</div>';
				}

				if (!empty($response["data"])) {
					$json = json_encode(
						json_decode($response["data"]),
						JSON_PRETTY_PRINT
					);
					echo '<div class="http_data"><pre>' . $json . '</pre></div>';
				}
			}
		} else {
		?>
			<div class="http_default">
				<?php
				echo "Rien à afficher";
				?>
			</div>
		<?php
		}
		?>
	</div>

	<script>
		document.getElementById('parameters_box').addEventListener('keydown', function(e) {
			if (e.key == 'Tab') {
				e.preventDefault();
				if (e.shiftKey) {
					var start = this.selectionStart;
					var end = this.selectionEnd;
					var tabString = String.fromCharCode(9);

					var beforeSelection = this.value.substring(0, start);

					if (beforeSelection.endsWith(tabString)) {
						this.value = this.value.substring(0, start - 1) + this.value.substring(end);
					}

					this.selectionStart =
						this.selectionEnd = start - 1;
				} else {
					var start = this.selectionStart;
					var end = this.selectionEnd;

					this.value = this.value.substring(0, start) +
						"\t" + this.value.substring(end);

					this.selectionStart =
						this.selectionEnd = start + 1;
				}
			}

		});
	</script> <div></div>

</body>

</html>