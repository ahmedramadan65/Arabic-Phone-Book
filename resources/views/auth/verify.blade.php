@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تاكيد البريد الالكتروني') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('لقد تم ارسال رساله الي بريدك الالكتروني') }}
                        </div>
                    @endif

                    {{ __('من فضلك تاكد من بريدك الاكتروني') }}
                    {{ __('اذا لم تصلك الرساله') }}, <a href="{{ route('verification.resend') }}">{{ __('اضغط هنا للارسال مره اخري') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
