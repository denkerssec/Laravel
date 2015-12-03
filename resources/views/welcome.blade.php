<!DOCTYPE html>
<html>
    <head>
        <title>Denkers</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Denkers</div>
					<table>
						<?php
							error_reporting(E_ALL | E_STRICT);

							$inputString = 'First key this is the first value Second second value Thirt key 20394';
							$keys = ['First key', 'Second', 'Thirt key'];

							$res = [];
							foreach ($keys as $currentKey => $key) {
								$posNextKey = ($currentKey + 1 > count($keys)-1) // is this the last key/value pair?
											  ? strlen($inputString) // then there is no next key, we just take all of it
											  : strpos($inputString, $keys[$currentKey+1]); // else, we find the index of the next key
								$currentKeyLen = strlen($key);
								$res[$key] = substr($inputString, $currentKeyLen+1 /*exclude preceding space*/, $posNextKey-1-$currentKeyLen-1 /*exclude trailing space*/);
								$inputString = substr($inputString, $posNextKey);
							}

							print_r($res);
						?>
					</table>
            </div>
        </div>
    </body>
</html>
