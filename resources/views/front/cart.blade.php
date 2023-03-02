@extends('front.layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title') 
Cart
 @endsection
@section('content')
<div class="container"><br/>
<table class="table table-striped" id="cart">
  <thead>
    <tr>
        <th>Product photo</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @php $total=0 @endphp
  @if(session('cart'))
    @foreach (session('cart') as $id=>$details)
    @php $total+= $details['p_price']*$details['quantity'] @endphp
    <tr>
        <td>
        <img src="{{asset('product/'.$details['p_photo'])}}" width="50px" height="40px" alt="">
        </td>
        <td>{{$details['product_name']}}</td>
        <td>{{$details['p_price']}} руб</td>
        <td>
            <input type="number" class="form-control" value="{{$details['quantity']}}" min="1" onchange="cart_update({{$id}})" id="c_update{{$id}}">
        </td>
        <td>{{ $details['p_price']*$details['quantity']}} руб</td>
        <td>
            <button class="btn btn-danger" onclick="cart_remove({{$id}})">Delete</button>
        </td>
    </tr>
    @endforeach
 @endif
  </tbody>
    <tfoot>
        <tr>
            <td><h3></h3>Total: {{$total}} руб</td>
        </tr>
        <tr><td>
            <a href="{{url('/')}}">Back</a> /
            <a href="">Checkout</a>
        </td></tr>
    </tfoot>
</table>
</div>
@endsection
@section('js')
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


    function cart_update(id){
        var quantity = $('#c_update'+id).val();
        $.ajax({
            url: '{{route("cart_update")}}/'+id,
            method: 'put',
            data:{
                id:id, quantity:quantity
            },
            success: function(response){//console.log(response);
                    window.location.reload();
                }
        });
    }

    function cart_remove(id){
        if(confirm("Do you really want to remove?")){ 
            $.ajax({
                url: '{{route("cart_remove")}}/'+id,
                method: 'DELETE',
                data:{
                    id: id
                },
                success: function(response){
                    window.location.reload();
                }
            });
        }   
    }

    
</script>
@endsection