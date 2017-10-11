@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                <div>
                                    @if(Session::has('flash_message'))
                    <div class="session">{{Session::get('flash_message')}}</div>
                    @endif
        </div>
                </div>
                    <div>
                    <h2>
                        <label>
                            Products
                        </label>
                    </h2>
                    <table class="table">
                        <tr>
                        <td>
                            <h4>barcode&nbsp;</h4>
                        </td>
                        <td>
                            <h4>name&nbsp;</h4>
                        </td>
                        <td>
                            <h4>quantity&nbsp;</h4>
                        </td>
                        <td>
                            <h4>amount</h4>
                        </td>
                        <td>
                            
                        </td>
                        </tr>
                        @foreach($cartitems as $item)
                        <tr>
                            <td>
                            {{$item->barcode}}&nbsp;
                            </td>
                            <td>
                                {{$item->name}}&nbsp;
                            </td>

                            <td>
                                {{$item->quantity}}
                            </td>
                            <td>
                            {{$item->amount}}
                            </td>
                            <td>
                                <a href="removeproduct/{{$item->id}}">Remove Item</a>
                            </td>

                        </tr>
                        @endforeach
                        <tr>
                            
                        <td>
                                <h4><label>Total Price:P&nbsp;</label>{{$total}}</h4>
                         </td>
                         </tr>
                        <tr>
                            <td><a href="billinginfo"><button>Checkout</button></a></td>
                        </tr>

                    </table>







                </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
