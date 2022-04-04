@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>users</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="{{route('users.index')}}">users</li>

            </ol>
        </section>


        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-bottom: 15px">users<small></small></h3>

                <div class="row">

                      <div class="col-md-4">


                         <a href="{{route('users.create')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i>add</a>

                    </div>
                </div>

            </div>
            <!-- /.box-header -->
             <div class="box-body">

                 <table class="table table-hover">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>first_name</th>
                  <th>last_name</th>
                  <th>email</th>
                  <th>image</th>

                    <td>action</td>
                </tr>
                  </thead>
              <tbody>
                @foreach($users as $index=>$user)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$user->first_name}}</td>
                  <td>{{$user->last_name}}</td>
                  <td>{{$user->email}}</td>
                  <td><img src="{{asset('uploads/users/'.$user->image)}}" width="100px" class="img-thumbnail"></td>



                  <td>

                      <a href="{{route('users.edit',$user->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
                      edit</a>


                      <form  action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                    </form>



                  </td>
                </tr>
                @endforeach
            </tbody>

              </table>


              </div>

              <!-- box-body -->

          </div>
          <!-- box -->



        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
