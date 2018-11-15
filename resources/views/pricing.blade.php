@extends('layouts.app')

@section('content')
<div  class="container">
    <div  class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Simple Pricing</div>

                <div class="card-body">
                  {{env('APP_NAME')}} has a simple and afforadable price of $20 per month.
                  Sign up for a new account today and get 3 days access to the platform NO credit card needed!
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
