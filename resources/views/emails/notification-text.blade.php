GREENSTEPS REPORT UPDATE

Hello {{ $userName }},

{{ $notification->title }}

{{ $notification->message }}
@if($report)

Report #{{ $report->id }}: {{ $report->category }}
Location: {{ $report->location }}
@endif

Open GreenSteps: {{ $homeUrl }}

You received this email because email notifications are enabled for your GreenSteps account. You can change this preference in your profile settings.