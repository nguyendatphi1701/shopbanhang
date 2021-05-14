@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
			<style type="text/css">
				p.title_thongke {
				    text-align: center;
				    font-size: 20px;
				    font-weight: bold;
				    color: #fff;
				    margin-bottom: 10px;
				}
			</style>

<div class="row">
	<style type="text/css">
		table.table.table-bordered.table-dark {
		    background: #32383e;
		}
		table.table.table-bordered.table-dark tr th {
		    color: #fff;
		}
	</style>

<p class="title_thongke">Thống kê truy cập</p>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Đang online</th>
      <th scope="col">Tổng tháng trước</th>
      <th scope="col">Tổng tháng này</th>
      <th scope="col">Tổng một năm</th>
      <th scope="col">Tổng truy cập</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$visitor_count}}</td>
      <td>{{$visitor_last_month_count}}</td>
      <td>{{$visitor_this_month_count}}</td>
      <td>{{$visitor_year_count}}</td>
      <td>{{$visitors_total}}</td>
    </tr>
   
  </tbody>
</table>

</div>

<div class="row">

	<!--------------------------->

	<div class="col-md-12 col-xs-12">
		<style type="text/css">
			ol.list_views {
			    margin: 10px 0;
			    color: #fff;
			}
			ol.list_views a {
			    color: orange;
			    font-weight: 400;
			}
		</style>
		<h3>Sản phẩm xem nhiều</h3>

		<ol class="list_views">
			@foreach($product_views as $key => $pro)
			<li>
				<a target="_blank" href="{{url('/chi-tiet/'.$pro->product_slug)}}">{{$pro->product_name}} | <span style="color:black">{{$pro->product_views}}</span></a>
			</li>
			@endforeach
		</ol>

	</div>
</div>


</div>

@endsection