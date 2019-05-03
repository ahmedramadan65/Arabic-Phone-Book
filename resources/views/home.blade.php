@extends('layouts.app')
@section('title','الصفحه الرئيسيه')
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
                    <div class="container">
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
                          {{ $contacts->links() }}
                        </tbody>
                      </table>
                      <div class="text-center">
                        <a class="btn btn-primary" style="width: 40%" role="button" href="{{route('add.contact')}}">اضافه اسم جديد</a>
                        
                      </div>
                        <br><br>
                      <form action="{{route('search.contact')}}" method="GET" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchkey" style="border-radius: 4px;"
                                    placeholder="اكتب الاسم او الرقم الذي تريد البحث عنه">
                                <button class="btn btn-primary" style="width:40%; margin-left: 10px; " role="button" type="submit">البحث</button>
                            </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
