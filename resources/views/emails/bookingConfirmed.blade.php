<!-- resources/views/emails/bookingConfirmed.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p>Dear {{ $booking->user->name }},</p>
    <p>Thank you for booking with us. Your booking has been confirmed. Please proceed with the payment to the following account:</p>
    <p><strong>Bank Mandiri</strong></p>
    <p><strong>Account Name:</strong> Rafli Maulana</p>
    <p><strong>Account Number:</strong> 16700035400134</p>
    <p>Thank you for your cooperation.</p>
</body>
</html>
