<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Cảm ơn quý khách đã đặt hàng </h1>

@foreach($carts->items as $cat)
	<p>Tên sản phẩm: {{$cat['name']}} </p>
	<p>Số lượng: {{$cat['quantity']}} </p>
	<p>Đơn giá: {{number_format($cat['price'])}} VNĐ</p>
@endforeach
<h3>Tổng tiền : {{number_format($carts->total_price)}} VNĐ </h3>
</body>
</html>