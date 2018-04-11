@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Resend verification link</div>

                    <div class="card-body text-center">
                        <h5>Resend email verification</h5>
                        <a class="btn btn-primary" href="/resend_email_verification">Resend Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
