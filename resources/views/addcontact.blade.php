@extends('layouts.app')
@section('title','اضافه اسم جديد')
@section('content')
@include('alerts.alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">سجل الهاتف</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('add.contactForm')}}" name="form1">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control"  name="phone" required  >
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-12 offset-md-6">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('تسجيل الاسم') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
