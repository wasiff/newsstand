<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				    <meta http-equiv="Content-Type" content="text/html; charset='.strtolower(config_item('charset')).'" />
				    <title><?= html_escape($subject) ?></title>
				    <style type="text/css">
				        body {
				            font-family: Arial, Verdana, Helvetica, sans-serif;
				            font-size: 16px;
				        }
				    </style>
				</head>
				<body>
				<p>Thank you for registering.</p><p><a href="<?= base_url() ?>auth/verify/<?= $act_code ?>">Click here to verify your email</a></p><p>or copy and paste the following link in the browser <?= base_url() ?>auth/verify/<?= $act_code ?></p>
				</body>
				</html>