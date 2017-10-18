@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Invoice</div>

                <div class="panel-body">
                </div>
                    <div>
                    <h2>
                         <center>
                                <label>
                                    Invoice
                                </label>
                            </center>
                    </h2>
                    <h3>
                            <center>
                                <label>
                                    {{$date}}
                                </label>
                            </center>
                    </h3>
                    </div>

 <table class="table">
    <tr>
        <th>

        </th>
    </tr>
                        <tr>
                        <td>
                            <h4>barcode&nbsp;</h4>
                        </td>
                        <td>
                            <h4>name&nbsp;</h4>
                        </td>
                        <td>
                            <h4>product type&nbsp;</h4>
                        </td>
                        <td>
                            <h4>quantity&nbsp;</h4>
                        </td>
                        <td>
                            <h4>Unit Price&nbsp;</h4>
                        </td>
                        <td>
                            <h4>amount</h4>
                        </td>
                        <td>
                            
                        </td>
                        </tr>
                        @foreach($orderitems as $item)
                        <tr>
                            <td>
                            {{$item->barcode}}&nbsp;
                            </td>
                            <td>
                                {{$item->name}}&nbsp;
                            </td>
                            <td>
                                {{$item->product_type}}
                            </td>
                            <td>
                                {{$item->quantity}}
                            </td>
                            <td>
                                {{$item->amount}}
                            </td>
                            <td>
                            {{$item->price}}
                            </td>

                        </tr>
                        @endforeach
                        <tr>
                            
                        <td>
                                <h4><label>Total Price:P&nbsp;</label>{{$total}}</h4>
                         </td>
                         </tr>


                    </table>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
