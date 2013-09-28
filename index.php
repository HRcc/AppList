<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>

		<title>Applist @ <?php getName(); ?></title>

		<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" charset="utf-8" />
	</head>

	<body>
		<?php
			function getApps($path="../") {
				$apps = scandir($path);

				$appsno = 0;

				foreach ($apps as $app) {
					if ($app[0] != '.' && $app != 'list'){
						$appsno++;
						$url = $app;

						// Laravel App Support
						$content = scandir($path."/".$app);


						foreach ($content as $folder) {
							if ($folder == "public") {
								$url = $url."/public";
							}
						}


						echo "<li>
								<div class=\"content\">
									<a href=\"/$url\">
										$app
										<img src=\"assets/images/arrow.png\"/>
									</a>
								</div>
							  </li>";
					}
				}

				if ($appsno == 0) {
					echo "<li>
							<div class=\"content\">
								EMPTY
							</div>
						  </li>";
				}
			}

			function getName() {
				$host = substr($_SERVER['HTTP_HOST'],0,-11);
				$name = substr($host,3);
				echo ucwords($name);
			}
		?>

		<div id="apps-panel">
			<header>
				<span class="title"><strong>Application List @ <?php getName(); ?></strong></span>
			</header>

			<section id="content">
				<ul>
					<?php getApps(); ?>
				</ul>
			</section>
		</div>
	</body>
</html>