<!DOCTYPE html>
<html>
<head>
    <title>Rose Stone</title>
</head>
<body>
<h1>{{ $mailData['title'] }}</h1>
@foreach($mailData['body'] as $key =>$value )
    @if(str_contains($key,'subject'))

<h4 style="text-align: center;">{{ $value  }}</h4 >
@else
<p>{{ $key .' : '.$value  }}</p>
    @endif

@endforeach


<p>Thank you</p>
</body>
</html>
