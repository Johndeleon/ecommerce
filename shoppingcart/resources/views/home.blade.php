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
                    @foreach($products as $product)
                    <table class="table">
                        <tr>
                            <td>
                            <a href="product/{{$product->id}}">{{$product->name}}&nbsp;</a>
                            </td>
                            <td class="table td ">
                            {{$product->description}}
                            </td>
                            <td>
                            </td>
                        </tr>
                    </table>


                    @endforeach
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
