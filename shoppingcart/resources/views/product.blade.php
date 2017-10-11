@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">

                <div>
<form method="POST" action="addtocart/{{$product->id}}">
{{csrf_field()}}
                        <div hidden="true">{{$product->id}}</div>
                    <h2>{{$product->name}}</h2>
                    <h5>
                        {{$product->description}}
                    </h5>
                    <h5>
                       <label>Avalaiable Stock</label> {{$stock}}
                    </h5>

                        <div>
                            <label>Quantity</label><input type="number" name="quantity" required="true" min=1 max={{$stock}}>
                        </div>

                           <h3><label>Prices</label></h3>

    @foreach($prices as $price)
    <table>
        <tr>
            <td>
                {{$price->description}}:
            </td>

            <td>
                P{{$price->price}}
            </td>
        </tr>
    </table>
    @endforeach                        
                <label>Type: </label><select name="description" class="textbox" required="true">
                             @foreach($prices as $price)
                <option><h5>{{$price->description}}</h5> </option>
                @endforeach
                </select>


                    <button {{$enabled}}>Add to Cart</button>
                </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
