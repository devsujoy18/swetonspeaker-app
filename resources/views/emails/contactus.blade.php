<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us</title>
</head>
<body>
	<h2>New Contact Us Message</h2>
    <p><strong>Name:</strong> {{ $contact['name'] }}</p>
    <p><strong>Email:</strong> {{ $contact['email'] }}</p>
    <p><strong>Phone:</strong> {{ $contact['phone'] }}</p>
    <p><strong>Subject:</strong> {{ $contact['subject'] }}</p>
    <p><strong>Message:</strong> {{ $contact['message'] }}</p>
</body>
</html>