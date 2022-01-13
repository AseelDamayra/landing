@extends('layouts/backend/master')
@section('title')
Home Page
@endsection
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{trans('backend/portfolio.portfolio')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="col-md-12">
<div class="card">
              <div class="card-header ">
                <h3 class="card-title">{{trans('backend/portfolio.portfolio')}}</h3>
                 <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                 {{trans('backend/portfolio.Add portfolio category')}}
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->any() as $error)
                            <li>
                                 {{$error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                @endif


                @if(Session::has('add'))
                   <div class="alert alert-success">
                       {{Session::get('add')}}
                   </div>
                @endif
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>{{App::getlocale() == 'en' ? trans('backend/portfolio.name_EN') : trans('backend/portfolio.name_AR')}}</th>
                      <th>{{trans('backend/portfolio.description')}}({{trans('backend/portfolio.optional')}})</th>
                      <th >{{trans('backend/portfolio.action')}}</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                      <!-- الطريقة الاولى لعرض البيانات  -->
<!--                    
                      @forelse($portfolios as $portfolio)
                       <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$portfolio->name}}</td>
                          <td>{{$portfolio->description}}</td>
                          <td>delete</td>
                        </tr>  
                          @empty
                          <tr>no data</tr>
                      @endforelse -->
                   
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
               
                </ul>
              </div>
            </div>
</div>
</div>

@include('layouts.backend.portfolio.editModal')

@include('layouts.backend.portfolio.CreateModal')

@endsection