<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Application for Dealership</title>
</head>
<body>
	<h2>New Application for Dealership Message</h2>
    <p><strong>Organisation Name:</strong> {{ $result['organisation_name'] }}</p>
    <p><strong>Contact Person:</strong> {{ $result['contact_person'] }}</p>
    <p><strong>Phone:</strong> {{ $result['mobile_no'] }}</p>
    <p><strong>Address:</strong> {{ $result['address'] }}</p>
    <p><strong>Speaker:</strong> {{ $result['speaker'] }}</p>
</body>
</html>