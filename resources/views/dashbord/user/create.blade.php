@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>users</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{route('users.index')}}"><i class="fa fa-dashboard"></i>users</a></li>
                <li class="active">add</li>


            </ol>
        </section>

        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">add</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                @include('partials._error')
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                  @CSRF
                  @method('POST')
                <div class="form-group">
                  <label>first_name</label>
                  <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
                </div>
                   <div class="form-group">
                  <label>last_name</label>
                  <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                </div>
                   <div class="form-group">
                  <label>email</label>
                  <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                   <div class="form-group">
                  <label>image</label>
                  <input type="file" class="form-control image" name="image">
                </div>
                 <div class="form-group">
                  <img src="{{asset('uploads/users/user.png')}}" width="100px" class="img-thubnail img-preview">
                </div>
                <div class="form-group">
                  <label >password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                <p>gender:</p>
                <input type="radio"  name="gender" value="male">
                <label for="male">male</label><br>

                <input type="radio" name="gender" value="female">
                <label for="female">female</label><br>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>add</button>
              </div>
              </form>
              </div>
              <!-- /.box-body -->


          </div>
          <!-- /.box -->



        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
