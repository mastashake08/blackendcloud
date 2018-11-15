@extends('layouts.app')

@section('content')
<div  class="container">
    <div  class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Total Privacy</div>

                <div class="card-body">
                  {{env('APP_NAME')}} treats privacy as its <strong>#1</strong> priority! Everything is encrypted server wide and most are also encrypted end-to-end. Sleep soundly knowing your data is protected.
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
