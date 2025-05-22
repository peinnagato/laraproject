<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to eSewa...</title>
</head>
<body onload="document.getElementById('esewa-payment-form').submit();">
    <h3>Redirecting to eSewa...</h3>

    <form id="esewa-payment-form" action={{ $process_url }} method="POST">
        @foreach ($form_data as $key => $value)
        <pre>{{ print_r($form_data, true) }}</pre>
            <input type="hidden" name={{ $key }} value={{ $value }}>
        @endforeach
    </form>
</body>
</html>
