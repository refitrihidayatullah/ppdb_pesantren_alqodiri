@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="#" id="step-form-horizontal" class="step-form-horizontal">
            <div>
                <h4>Data Diri</h4>
                <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="password" name="Password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                </section>
                <h4>Your Address</h4>
                <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="lastName" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="zip" class="form-control" placeholder="ZIP Code" required>
                            </div>
                        </div>
                    </div>
                </section>
                <h4>Billing Details</h4>
                <section>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="creditCard" placeholder="Credit Card Number">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="date" placeholder="Expiration Date">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="owner" placeholder="Credit Card Owner">
                            </div>
                        </div>
                    </div>
                </section>
                <h4>Confirmation</h4>
                <section>
                    <div class="row h-100">
                        <div class="col-12 h-100 d-flex flex-column justify-content-center align-items-center">
                            <h2>You have submitted form successfully!</h2>
                            <p>Thank you very much for you information. we will procceed accordingly.</p>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </div>
</div>
@endsection