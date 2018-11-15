@extends('layouts.app')

@section('content')
<div  class="container">
    <div  class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Awesome Features</div>

                <div class="card-body">
                  {{env('APP_NAME')}} has all the features you need to run your business including:
                  <ul>
                    <li>Encrypted storage</li>
                    <li>Encrypted video/audio chat with screen sharing</li>
                    <li>Encrypted web email client send OpenPGP messages.</li>
                    <li>Real-time document editing with collaborators</li>
                    <li>Plus MORE!</li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
