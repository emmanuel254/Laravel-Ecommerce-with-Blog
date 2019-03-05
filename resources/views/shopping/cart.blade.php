@extends('main')

@section('title','| Cart Details')

@section('content')
	       
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive">
            @if(count($cart))

            <div class="row">
                
            </div>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Title</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="tota">Total</td>
                        <td>Remove</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('products/'.$product->find($item->id)->image) }}" alt="" width="45px" height="45px"></a>
                        </td>
                        <td class="cart_description">
                            <h5><a href="">{{$item->name}}</a></h5>
                            <p>Web ID: {{$item->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$item->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a  href="{{url("cart?product_id=$item->id&increment=1")}}"> + </a>
                                <input  type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="1">
                                <a href="{{url("cart?product_id=$item->id&decrease=1")}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$item->subtotal}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="text-danger" href="{{url("cart?product_id=$item->id&destroy")}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                   
                    @endforeach
                     
                 
                    @else
                <p>You have no items in the shopping cart</p>
                @endif
                </tbody>
            </table>
        </div>

           {{--  <form method="POST" action="{{ url('store/'.$item->rowId) }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="identifier" value="{{ $item->rowId }}">
                        
                        <input type="submit" class="btn btn-primary" value="Complete Order">
                    </form>

                    <button class="submit check_out">Clear Cart</button> --}}
    </div>
</section> <!--/#cart_items-->

{{-- checkout details --}}
<div class="checkout-left"> 
                <div class="col-md-4 checkout-left-basket">
                    <h4>ITEMS YOU'VE ORDERED</h4>
                    <ul>
                        @foreach($cart as $items)
                          <li>{{ $items->name }} <i>-</i> <span>Ksh. {{ $items->subtotal }} </span></li>
                   
                        @endforeach
            
                         <li>
                            <input type="checkbox">
                            <label><h5>Use Gift Voucher</h5> </label>
                        </li>
                        <li><h3> Total <i>-</i> <span>{{ Cart::total() }}</span></h3></li>
                    </ul>
                </div>
                <div class="col-md-8 address_form_agile">
                    <div class="row">
                        <div class="checkout-right-basket">
                            <h4>FILL YOUR DELIVERY DETAILS</h4>
                         </div>
                    </div>
                     
                <form action="{{ url('store/'.$item->rowId) }}" method="post" class="creditly-card-form agileinfo_form">
                    
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="identifier" value="{{ $item->rowId }}">

                                    <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                        <div class="information-wrapper">

                                            <div class="first-row form-group">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                         <div class="controls">
                                                            <label class="control-label">Full name: </label>
                                                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="controls">
                                                            <label class="control-label">Email Address: </label>
                                                            <input class="billing-address-name form-control" type="email" name="email" placeholder="example@gmail.com">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                         <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                            <label class="control-label">Mobile number:</label>
                                                            <input class="form-control" type="number" placeholder="Mobile number" name="phone">
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="w3_agileits_card_number_grid_right">
                                                            <div class="controls">
                                                                <label class="control-label">Landmark: </label>
                                                             <input class="form-control" type="text" placeholder="Landmark" name="landmark">
                                                            </div>
                                                    </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="controls">
                                                             <div class="controls">
                                                                <label class="control-label">Town/City: </label>
                                                             <input class="form-control" type="text" placeholder="Town/City" name="town">
                                                            </div>
                                                      </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="controls">
                                                            <label class="control-label">Address type: </label>
                                                                 <select class="form-control option-w3ls" name="address_type">
                                                                    <option>Office</option>
                                                                    <option>Home</option>
                                                                    <option>Commercial</option>
                            
                                                                </select>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="controls">
                                                             <div class="controls">
                                                                <label class="control-label">Address: </label>
                                                             <input class="form-control" type="text" placeholder="Address" name="address">
                                                            </div>
                                                      </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="controls">
                                                             <div class="controls">
                                                                <label class="control-label">Pickup Point </label>
                                                             <input class="form-control" type="text" placeholder="Pickup Point Name" name="pickup_point">
                                                            </div>
                                                      </div>

                                                    </div>
                                                </div>
                                                
                                                    
                                            </div>
                                            <div class="row">

                                                 <div class="col-md-6">
                                                   
                                                </div>

                                                <div class="col-md-6">
                                                    <input type="submit" class="btn btn-primary" value="Save & Continue >>">    
                                                </div>

                                            </div>
                                            
                                        </div>
                                    </section>
                                </form>
                                    
                    </div>
            
                <div class="clearfix"> </div>
                
            </div>

@endsection