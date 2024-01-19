{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
</head>
<body>
    <h1>Product: Mobile phone</h1>
    <h1>Price: 20</h1>
    <form action="{{ route('paypal') }}" method="POST">
        @csrf
        <input type="hidden" name="price" value="20">
        <button type="submit">Pay with Paypal</button>
    </form>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Pay 100</a>
    @if (\Session::has('error'))
        <div class="alert alerr-danger">{{ \Session::get('error') }}</div>
    @endif
</body>

</html>
