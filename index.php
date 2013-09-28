<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>

		<title>Applist @ Raphael</title>

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
						echo "<li>
								<div class=\"content\">
									<a href=\"/$app\">
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
		?>

		<div id="apps-panel">
			<header>
				<span class="title"><strong>Application List @ Raphael</strong></span>
			</header>

			<section id="content">
				<ul>
					<?php getApps(); ?>
				</ul>
			</section>
		</div>
	</body>
</html>