@extends('frontend.master')
@section('content')

<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
.profile{margin:100px}
</style>
</head>
<body>
<div class="profile">
<h2>Hồ Sơ Của Tôi</h2>

<table>
  <tr>
    <th>Họ & Tên</th>
    <th>email</th>
  </tr>
  <tr>
    <td>{{Auth::user()->user_name}}</td>
    <td>{{Auth::user()->user_name}}</td>
  </tr>

</table>

</body>
</html>

</div>
@endsection