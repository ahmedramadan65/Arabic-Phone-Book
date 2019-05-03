@extends('layouts.app')
@section('title','البحث')
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
                @if(count($contacts)>0)
                    <table id='table1' class="table table-bordered">
                        <thead>
                          <tr>
                            <th>الاسم</th>
                            <th>رقم الهاتف</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                  <tr>
                                      <td style="width: 40%">
                                              {{$contact->name}}
                                      </td>
                                      <td>
                                              {{$contact->phone}}
                                      </td>
                                      <td style="width: 25%">
                                          <a class="btn btn-outline-info mainbutton"  role="button" href="{{route('update.contact',['id'=>$contact->id])}}">تعديل</a>
                                          <a class="btn btn-danger mainbutton" role="button" href="{{route('delete.contact',['id'=>$contact->id])}}">مسح</a>
                                      </td>
                                  </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @else
                        <div class="col-md-12 ">
                            <div class="alert alert-danger" role="alert">
                                <p>الاسم او الرقم الذي تبحث عنه غير موجود</p>
                            </div>
                        </div>
                    @endif
                      <div class="col-md-12">
                        <a class="btn btn-outline-info"  role="button" href="{{route('home')}}">الرجوع الي السجل</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

