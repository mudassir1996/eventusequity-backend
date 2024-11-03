<!doctype html>
<html>
<head>

<title>Add Transaction</title>
<meta charset="utf-8">
<meta name='author' content='Najeeb Shaukat, najeeb.shaukat@mwanmobile.com'>
<meta name='designer' content='Najeeb Shaukat'>

<style type="text/css">
CLIENT-SPECIFIC STYLES
body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

/* RESET STYLES */
img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 30px 0px; width: 100% !important; }
a{
    text-decoration: none !important;
}

@font-face {
    font-family: Product sans bold;
    src: url('{{asset("fonts/Produc-Sans-Bold.ttf")}}');
}

@font-face {
    font-family: Product sans;
    src: url('{{asset("fonts/Product-Sans-Regular.ttff")}}');
}

/* iOS BLUE LINKS */
a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}
.mimeStatusWarning{
    background-color: #ffffff !important;
}

.spk_card{
	height: 200px;
}

 p, ul li {
	/*font-weight: 500;*/
 }
 
 p, h1 {
	margin-top: 10px !important;
	margin-bottom: 0 !important;
 }
 
.mob-row {
	display: none;
}

.btn-start:hover {
	background-color: #002032 !important;
	border-color: #002032 !important;
}

ul.f-list {
	padding-inline-start: 0px;
	margin-top: 4px;
}

ul.f-list li {
	display: inline-block;
	margin-right: 10px;
	font-size: 16px;
	font-weight: 400;
	list-style-type: none;
}

ul.f-list li a {
	color: #626262;
	font-size: 14px;
}

ul.f-list li a:hover {
	text-decoration: underline !important;
}


/* MOBILE STYLES */
@media screen and (max-width: 600px) {
   .dsk-row {
	display: none ;
   }
   
   .mob-row {
		display: block !important;
	}
	
  .img-max {
    width: 100 px !important;
    height: auto !important;
  }
  

  .img-maxx {
    width: 100% !important;
    max-width: 100% !important;
    height: auto !important;
  }
  
  .img-spk {
	width: 200px !important;
	max-width: 200px !important;
	height: auto !important;
  }

  .max-width {
    max-width: 100% !important;
  }
  
  .f_left {
	float: left !important
  }

  .mobile-wrapper {
    width: 85% !important;
    max-width: 85% !important;
  }

  .mobile-padding {
    padding-left: 5% !important;
    padding-right: 5% !important;
  }

  .full-width {
    width: 100% !important;
  }
  
  .half-width {
	 width: 50% !important;
  }
  
  .spk_card{
		height: auto;
		margin-bottom: 20px;
		padding: 20px 10px !important;
	}
	
	.mobile_h3{
		font-size: 16px !important;
		margin-bottom: 10px !important;
	}
	
	.spk_card p {
		font-size: 14px !important;
		line-height: 25px important;
		margin-left: 0px !important;
		-webkit-margin-befor: 0 !important;
	}
	
	.mobile-p {
		font-size: 15px !important;
		line-height: 20px !important;
		text-align: left !important;
	}
	
	.small-text {
		font-size: 15px !important;
	}
	
	.mob_p {
		margin-bottom: 10px !important;
		margin-top: 0px !important;
	}
	
	.pad-10 {
		padding: 0px 10px !important;
	}
	
	.pad-20 {
		padding: 0px 10px !important;
	}
	
	/*==new css ==*/
	.mob-center {
		text-align: center !important;
	}
	
	.dsk-logo {
		display: none;
	}
	
	.mob-logo {
		display: inline !important;
	}
	
	.mob-td {
		width: 100%;
		padding-left: 0px !important;
		padding-right: 0px !important;
		float: left;
		text-align: center !important;
	}
	
	ul.f-list li {
		margin-bottom: 10px;
		margin-right: 5px;
		margin-left: 5px;
	}
}

/* ANDROID CENTER FIX */
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="margin: 0 !important; background-color: #f4f4f4;" bgcolor="#f4f4f4">
<!--main table -->

<table border="0" cellpadding="10" cellspacing="0" width="100%">

	<tr>
		<td align="center" valign="top" width="100%" style="padding: 10px 0 10px 0;" class="mobile-padding">
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 
			class="full-width" bgcolor="ffffff" style = "border-radius:0px;">
				<td>
					
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="20" class = "full-width" 
							bgcolor = "#fff" style = "border-radius:30px;">
								<tr>
									<td align = "left">
										<table width = "100%" align = "center" cellspacing="0" cellpadding="20" 
										class = "full-width">
										
											<tr>
									
												<td align="left" valign="top" style="padding: 0px 20px 0px 20px; text-align: center; 
												background-color: #fff; overflow: hidden;border-bottom: 1px solid #E2E2E2;">
													<img style = " width: 180px; margin-top:20px;margin-bottom:20px;" alt = "algosports" src = "{{asset('images/logo.png')}}">
												</td>
												
											</tr>
											
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class = "full-width" 
							bgcolor = "#fff" style = "margin-bottom:60px;">
								<tr>
									<td align = "left">
										<table width = "100%" align = "center" cellspacing="0" cellpadding="20" class = "full-width">
											
											<tr>
									
													<td class = "mobile-p" align="left" style="padding:0px 40px 0px 40px; 
													font-family: 'Product sans bold;line-height: 1.5;">
														<h1 style = "text-align:left;font-weight: 700; font-size:20px;color: #2AD588;font-family: 'Product sans bold', sans-serif;">
															<span style = "font-weight:500;">{{$transaction_data['transaction_type'] == 'withdraw' ? 'Withdrawal Requested' : 'Deposit Successful'}}</span>
														</h1>
														
														@if ($transaction_data['transaction_type']=='deposit')
															<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:15px;
															margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">
																{{ucfirst($transaction_data['full_name'])}} your payment of <span style="color: #2AD588;">£{{number_format($transaction_data['transaction_amount'],2)}}</span> has been confirmed with AlgoSports Group.
															</p>
															<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:15px;
															margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">
																It has now been added to your trading account with AlgoSports Group.
															</p>
															<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:5px;
															margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">	
																If you have any questions, we're always happy to help out, just email us.
																														
															</p>
															@else
																<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:15px;
																margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">
																	{{ucfirst($transaction_data['full_name'])}} Your Withdrawal of <span style="color: #2AD588;">£{{number_format($transaction_data['transaction_amount'],2)}}</span> has been initiated with AlgoSports Group.
																</p>
																<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:15px;
																margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">
																	It will now be passed to your Account Manager Daniel Spencer.
																</p>
																<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:5px;
																margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">	
																	If you have any questions, we're always happy to help out, just email us.
																															
																</p>
														@endif
													</td>
												
											</tr>
											{{-- <tr>
									
													<td class = "mobile-p" align="center" style="padding:40px 40px 40px 40px; 
													font-family: 'Product sans bold', sans-serif;line-height: 1.5;">
													
														<a class = "btn-start" href = "{{route('login')}}" style = "max-width: 220px;border-radius: 6px;background-color: #2AD588;border:1px solid #2AD588;color:#fff;padding: 15px 25px;font-weight: 700;font-size:16px;">
														Login to your account
														</a>
														
														<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:35px !important;
														margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">
															Please change the password after login, from profile section.
														</p>
														<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:5px;
														margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">	
															If you have any questions, we're always happy to help out, just email us.
																													
														</p>
														<!--[if mso]>
															  <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:45px;v-text-anchor:middle;width:220pt; padding-top:10px;padding-bottom:10px; padding-left:25px;padding-right:25px;" arcsize="25%" strokecolor="#2AD588;" fillcolor="#2AD588;">
																<w:anchorlock/>
																<center style="color:#ffffff;font-family:Roboto', sans-serif;font-size:16px;">
																	Loing to your account
																</center>
															  </v:roundrect>
														<![endif]-->
													</td>
												
											</tr> --}}
											
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class = "full-width" 
							bgcolor = "#fff">
								<tr>
									<td align = "left">
										<table width = "100%" align = "center" cellspacing="0" cellpadding="20" 
										class = "full-width">
											
											<tr>
									
													<td class = "mobile-p" align="center" style="padding:20px 40px 40px 40px; 
													font-family: 'Roboto', sans-serif;line-height: 1.5; font-weight:300;">
														<p class = "mobile-p" align="center" style = "font-weight: 400; margin-top:5px;
														margin-bottom: 10px !important;font-size: 16px; color: #626262;font-family: 'Product sans', sans-serif;">
															Regards, <br>
															AlgoSports Group
														</p>
														
													</td>
												
											</tr>
											
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class = "full-width" 
							bgcolor = "#fff">
								<tr>
									<td align = "left">
										<table width = "100%" align = "center" cellspacing="0" cellpadding="0" 
										class = "full-width">
											
											<tr>
									
													<td class = "mobile-p" align="left" style="padding:0px 40px 0px 40px; 
													font-family: 
													verdana, sans-serif;line-height: 1.5; font-weight:400;">
														<hr style = "border-color: #DBDBDB;margin-block-end: 0px;
															margin-block-start: 0px;border:1px solid #dbdbdb;border-bottom: none;">
													</td>
												
											</tr>
											
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<!--footer yaha say start ho raha ha ur sara footer new ha-->
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class = "full-width" 
							bgcolor = "#fff" style = "border-radius:30px;">
								<tr>
									<td align = "left">
										<table width = "100%" align = "center" cellspacing="0" cellpadding="20" class = "full-width">
										
											<tr>
											
												<td align="center" height="100%" valign="top" width="100%" 
												class="mobile-padding" style = "padding:0px;">
													<table align="center" border="0" cellpadding="0" cellspacing="0" 
													 width="600" class="full-width" bgcolor="ffffff">
														<tr>
														
															<td align="center" valign="top">
																
																<table align="left" border="0" cellpadding="0" cellspacing="0"
																width="100%" class="full-width">
																	<tr>
																		<td class = "mobile-p mob-td" align="left" style="padding:10px 40px 0px 40px; font-family: 'Product sans', sans-serif;line-height: 1.5; font-weight:400;font-size:14px;">
																			<ul class = "f-list">
																				<li>
																					<a style="color: #2AD588" href = "http://www.algosportsgroup.com">
																					www.algosportsgroup.com
																					</a>
																				</li>
																			</ul>
																		</td>
																		<td class = "mobile-p mob-td" align="right" style="padding:10px 40px 0px 40px; font-family: 'Roboto', sans-serif;line-height: 1.5; font-weight:400;">
																			<a href = "https://twitter.com/AlgoSportsGroup" style = "margin-right:5px;">
																				<img src = "{{asset('images/email/twitter.png')}}" alt = "twitter-icon">
																			</a>
																		</td>
																	</tr>
																	
																	<tr>
																		<td class = "mobile-p mob-td" align="left" style="padding:10px 40px 0px 40px; font-family: 'Roboto', sans-serif;line-height: 1.5; font-weight:400;">
																			<p class = "mobile-p" align="left" style = "font-weight: 400;
																			margin-bottom: 5px !important;font-size: 14px; color: #626262;font-family: 'Product sans', sans-serif;">
																			See our reviews on
																			</p>
																			<a href = "https://www.trustpilot.com/review/algosportsgroup.com" style = "margin-right:5px;">
																				<img src = "{{asset('images/trust-pilot.png')}}"  style="height:45px" alt = "trust-pilot-icon">
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td colspan="2" class = "mobile-p mob-td" align="left" style="padding:10px 40px 0px 40px; font-family: 'Product sans', sans-serif;line-height: 1.5; font-weight:400;font-size:14px;">
																		<p class = "mobile-p" align="left" style = "font-weight: 400; margin-top:15px;
																			margin-bottom: 10px !important;font-size: 14px; color: #626262;font-family: 'Product sans', sans-serif;">
																			This email and any attachments to it are confidential and intended solely for the person to whom they are addressed. They may contain legally privileged information. If you have received this in error, please delete this message and let us know by emailing info@algosportsgroup.com. The messaging system from which this e-mail was sent is checked regularly for viruses. No liability is accepted for any viruses which may be transmitted in or with this e-mail from AlgoSports Group.
																		</p>
																		</td>
																	</tr>
																</table>
																
															</td>
															
														</tr>
													</table>
													
												</td>
											
											</tr>
											
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<!--footer yaha pe end ho rha ha-->
					
					<tr>
						<td align="center">
						
							<table width="100%" border="0" cellspacing="20" cellpadding="0">
								<tr>
									<td align="center" style="padding: 10px 20px 10px 20px;">
										
										
													
									</td>
								</tr>
				
							</table>
							
						</td>
					</tr>
					
				</td><!--Main td-->	
			</table>
		</td>
	</tr>

</table>

</body>
</html>

