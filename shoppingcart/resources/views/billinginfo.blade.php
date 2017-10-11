@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Billing Info</div>

                <div class="panel-body">

                </div>
                    <div>
<form method="POST" action="savebillinginfos">
    {{csrf_field()}}
    <table class="table">
                        <tr>
                            <td>first name:</td>
                            <td><input type="text" name="firstname" required="true"></td>
                        </tr>
                        <tr>
                            <td>last name:</td>
                            <td><input type="text" name="lastname" required="true"></td>
                        </tr>
                        <tr>
                            <td>address for delivery:</td>
                            <td><input type="text" name="address" required="true"></td>
                        </tr>
                        <tr>
                            <td>phone number:</td>
                            <td><input type="text" name="phonenumber" required="true"></td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td><input type="email" name="email" required="true"></td>
                        </tr>
                        <tr>
                            <td>name of substitute recepient:</td>
                            <td><input type="text" name="substitute_recepient" required="true"></td>
                        </tr>
                        <tr>
                            <td><button>next</button></td>
                        </tr>
                    </table>
    
</form>
                    



                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
