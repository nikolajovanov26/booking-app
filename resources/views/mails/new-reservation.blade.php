<h1>Hello {{ $ownerName }},</h1>
<h2>You have received a new reservation on {{ $propertyName }}!</h2>
<hr>
<h3>Details</h3>
<table cellspacing="3" cellpadding="3">
    <tr>
        <td>Property Name</td>
        <td>{{ $propertyName }}</td>
    </tr>
    <tr>
        <td>Room</td>
        <td>#{{ $roomId }} {{ $roomName }}</td>
    </tr>
    <tr>
        <td>Payment Method</td>
        <td>{{ $paymentMethod }}</td>
    </tr>
    <tr>
        <td>Price</td>
        <td>{{ $price }}</td>
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
        <td>Customer Name</td>
        <td>{{ $customerName }}</td>
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
<hr>

