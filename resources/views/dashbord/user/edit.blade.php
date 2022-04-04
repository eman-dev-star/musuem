@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>users</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{route('users.index')}}"><i class="fa fa-dashboard"></i>users</a></li>
                <li class="active">edit</li>


            </ol>
        </section>

        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                @include('partials._error')
                <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                  @CSRF
                  @method('PUT')
                <div class="form-group">
                  <label>@lang('site.first_name')</label>
                  <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                </div>
                   <div class="form-group">
                  <label>@lang('site.last_name')</label>
                  <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                </div>
                   <div class="form-group">
                  <label>@lang('site.email')</label>
                  <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
                  <div class="form-group">
                  <label>@lang('site.image')</label>
                  <input type="file" class="form-control image" name="image">
                </div>
                 <div class="form-group">
                  <img src="{{asset('uploads/users/'.$user->image)}}" width="100px" class="img-thubnail img-preview">
                </div>

                <div class="form-group">

                    <p>gender:</p>


                    <input type="radio"  name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                    <label for="male">male</label><br>

                    <input type="radio" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                    <label for="female">female</label><br>
                    </div>



              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</button>
              </div>
              </form>
              </div>
              <!-- /.box-body -->


          </div>
          <!-- /.box -->



        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
