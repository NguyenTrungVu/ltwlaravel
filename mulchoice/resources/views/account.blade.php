<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style type="text/css">
    div{border: 1px solid gray; text-align: center;}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
@foreach($category as $p)
<div class="col-md-3">
<a href='#'>{{$p->name}}</a><br>

</div>
@endforeach
</div>
</div>
</body>
</html>