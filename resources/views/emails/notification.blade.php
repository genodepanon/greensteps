<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="color-scheme" content="light">
	<title>{{ $notification->title }} | GreenSteps</title>
</head>
<body style="margin:0; padding:0; background:#edf3f1; color:#183b3a; font-family:Arial, Helvetica, sans-serif;">
	<div style="display:none; max-height:0; overflow:hidden; opacity:0; color:transparent;">
		{{ $notification->message }}
	</div>
	<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#edf3f1;">
		<tr>
			<td align="center" style="padding:36px 16px;">
				<table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:600px;">
					<tr>
						<td style="padding:0 8px 18px;">
							<table role="presentation" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td width="38" height="38" align="center" valign="middle" style="width:38px; height:38px; border-radius:12px; background:#2d7a4f; color:#ffffff; font-size:13px; font-weight:700;">GS</td>
									<td style="padding-left:11px; color:#183b3a; font-size:18px; font-weight:700;">GreenSteps</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="padding:0; border:1px solid #d9e5df; border-radius:16px; background:#ffffff; overflow:hidden;">
							<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tr><td height="6" style="height:6px; background:#2d7a4f; font-size:0; line-height:0;">&nbsp;</td></tr>
								<tr>
									<td style="padding:34px 38px 12px;">
										<div style="margin-bottom:12px; color:#2d7a4f; font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase;">Report update</div>
										<h1 style="margin:0 0 14px; color:#183b3a; font-size:26px; line-height:1.25; font-weight:700;">{{ $notification->title }}</h1>
										<p style="margin:0 0 22px; color:#506563; font-size:15px; line-height:1.65;">Hello {{ $userName }}, {{ $notification->message }}</p>
										@if($report)
											<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin:0 0 26px; border:1px solid #e1ebe5; border-radius:10px; background:#f6faf7;">
												<tr>
													<td style="padding:15px 17px 4px; color:#6a7e78; font-size:11px; font-weight:700; letter-spacing:.7px; text-transform:uppercase;">Report #{{ $report->id }}</td>
												</tr>
												<tr>
													<td style="padding:4px 17px 6px; color:#183b3a; font-size:16px; line-height:1.4; font-weight:700;">{{ $report->category }}</td>
												</tr>
												<tr>
													<td style="padding:0 17px 15px; color:#617571; font-size:13px; line-height:1.5;">{{ $report->location }}</td>
												</tr>
											</table>
										@endif
										<table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin:0 0 28px;">
											<tr>
												<td align="center" style="border-radius:8px; background:#2d7a4f;">
													<a href="{{ $homeUrl }}" style="display:inline-block; padding:13px 21px; border:1px solid #2d7a4f; border-radius:8px; color:#ffffff; font-size:14px; line-height:1; font-weight:700; text-decoration:none;">Open GreenSteps</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="padding:18px 38px 24px; border-top:1px solid #e8efeb; color:#73847f; font-size:12px; line-height:1.6;">
										You received this email because email notifications are enabled for your GreenSteps account. You can change this preference in your profile settings.
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td align="center" style="padding:18px 12px 0; color:#82938d; font-size:11px; line-height:1.5;">GreenSteps · Environmental Reporting System</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>