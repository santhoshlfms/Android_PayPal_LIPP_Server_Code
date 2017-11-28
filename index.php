
<!DOCTYPE html>
<html>
	<head>
		
		<title>PayPal</title>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

		<style type="text/css">
			html {
				  position: relative;
				  min-height: 100%;
				}
				body {
				  /* Margin bottom by footer height */
				  margin-bottom: 60px;
				}
				.footer {
				  position: absolute;
				  bottom: 0;
				  width: 100%;
				  /* Set the fixed height of the footer here */
				  height: 60px;
				  background-color: #f5f5f5;
				}

				body > .container {
				  padding: 60px 15px 0;
				}
				.container .text-muted {
				  margin: 20px 0;
				}

				.footer > .container {
				  padding-right: 15px;
				  padding-left: 15px;
				}

				small {
				  font-size: 80%;
				}
				.btn-primary {
				    color: #fff;
				    background-color: #003087 !important;
				    border-color: #003087 !important;
				     border-radius: 0
				}

				.navbar-inverse {
					    background-color: #003087 !important;
					    border-color: #003087 !important;
					    border-radius: 0
					}

		</style>
		</head>
	<body>
	   <noscript>
			<div class="container" style="position: fixed; top: 0px; left: 0px; z-index: 3000; 
		                height: 100%; width: 100%; background-color: #FFFFFF">
		        <p style="margin-left: 10px">JavaScript is not enabled. Redirecting ..... </p>
		    </div>
	      <meta http-equiv="refresh" content="5; url=https://www.aliexpress.com/" />
	    </noscript>

			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#">
			       	<img alt="Brand" height="30" src="https://www.paypalobjects.com/webstatic/i/logo/rebrand/ppcom-white.svg" width="90">
			      </a>
			    </div>
			  </div>
			</nav>	

	<div class="container">
		<div class="row">
				
		<div class="row" style="margin-top: 100px">
			<div class="col-md-5 col-md-offset-4 col-xs-10 col-xs-offset-1">
				<?php

					//test comment
					$url = "https://api.sandbox.paypal.com/v1/identity/openidconnect/tokenservice";
					$client_id="AejDgPpCL50-gfCE4thcBgUWKlg1aXDC0GAzAE9RngPmECpPYBqUnR2FBW4u7zT2e8NteID4qBbNryFv";
					$client_secret="EGzfvwCUtaXhP--F7Jftr89SejD1DGauo08fBZTW00B-fNgH7fubLDRvt4-lHz4O8GDNxcs7zarGGCff";
					$code = $_REQUEST['code'];
				
					$nvpStr="client_id=".$client_id."&client_secret=".$client_secret."&grant_type=authorization_code&code=".$code;
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate,sdch');
					curl_setopt($ch, CURLOPT_URL,$url);
					curl_setopt($ch, CURLOPT_VERBOSE, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,$nvpStr);
					curl_setopt($ch, CURLOPT_SSLVERSION, 1);
					$result = curl_exec($ch);
			
					$obj = json_decode($result);
					$access_token = $obj->access_token;
					$url = "https://api.sandbox.paypal.com/v1/identity/openidconnect/userinfo/?schema=openid"; 
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate,sdch');
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$access_token));
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_VERBOSE, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$result = curl_exec($ch);
					$json = json_decode($result, true);
					$obj = json_decode($result);
				
					?>
                    <div>
						<?php 
							echo "Thank you ".$json['name'];
						?>
					</div>
					<div class="row" style="margin-top:30px">
					    <input type="button" class="btn btn-primary" onclick="RedirectSuccess();" name="ok" value="Continue"  />
					    <input type="button" class="btn btn-primary" onclick="RedirectCancel();" name="ok" value="Cancel"  />
					    <a href="com.example.ecdemo">SUPER </a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<script>
	        function RedirectSuccess(){
	        
	            window.location="com.example.paypalcustomtabdemo:/success";
	        }
	        function RedirectCancel(){
	            window.location="com.example.sannelson.customtabdemo:/cancel";
	        }
	        
	       
	</script>
</html>
