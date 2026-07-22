<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product Enquiry</title>
</head>
<body>
	<h2>New Product Enquiry Email</h2>
    <p><strong>Name:</strong> {{ $result['name'] }}</p>
    <p><strong>Email:</strong> {{ $result['email'] }}</p>
    <p><strong>Whatsapp No:</strong> {{ $result['whatsapp_no'] }}</p>
    <p><strong>Product Name:</strong> {{ $result['product_name'] }}</p>
    <p><strong>Quantity:</strong> {{ $result['quantity'] }}</p>
    <p><strong>Location:</strong> {{ $result['location'] }}</p>
    <p><strong>Comments:</strong> {{ $result['comments'] }}</p>
</body>
</html>