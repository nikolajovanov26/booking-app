<h1>Hello {{ $customerName }},</h1>
<h2>You have successfully reserved a room!</h2>
<hr>
<h3>Details</h3>
<table cellspacing="3" cellpadding="3">
    <tr>
        <td>Property Name</td>
        <td>{{ $propertyName }}</td>
    </tr>
    <tr>
        <td>Room</td>
        <td>{{ $roomName }}</td>
    </tr>
    <tr>
        <td>Payment Method</td>
        <td>{{ $paymentMethod }}</td>
    </tr>
    <tr>
        <td>Nights</td>
        <td>{{ $nights }}</td>
    </tr>
    <tr>
        <td>Date From</td>
        <td>{{ $dateFrom }}</td>
    </tr>
    <tr>
        <td>Date To</td>
        <td>{{ $dateTo }}</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>{{ $status }}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td>{{ $address }}</td>
    </tr>
    <tr>
        <td>City</td>
        <td>{{ $city }}</td>
    </tr>
    <tr>
        <td>County</td>
        <td>{{ $country }}</td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>{{ $phone }}</td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td>{{ $email }}</td>
    </tr>
</table>
<h3>Check-In</h3>
From {{ $checkInFrom }} to {{ $checkInTo }}
<h3>Check-Out</h3>
From {{ $checkOutFrom }} to {{ $checkOutTo }}
<hr>
<h3>Cancellation Policy</h3>
{{ $cancellationPolicy }}
<hr>
<p>Have a nice trip!</p>
