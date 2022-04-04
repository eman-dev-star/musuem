@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>sculptures</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="{{route('sculptures.index')}}">sculptures</li>

            </ol>
        </section>


        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-bottom: 15px"><small></small></h3>

                <div class="row">
                      <div class="col-md-4">



                         <a href="{{route('sculptures.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>add</a>

                    </div>
                </div>

            </div>
            <!-- /.box-header -->
             <div class="box-body">

                 <table class="table table-hover">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>place name</th>
                 <th>sculpture name</th>
                 <th>code</th>
                 <th>lang</th>
                 <th>image</th>
                 <td>action</td>
                </tr>
                  </thead>
              <tbody>
                @foreach($sculptures as $index=>$sculpture)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$sculpture->place_name}}</td>
                  <td>{{$sculpture->sculpture_name}}</td>
                  <td>{{$sculpture->code}}</td>
                  <td>{{$sculpture->lang_name}}</td>
                  <td>
                    <img src="{{asset('uploads/sculpture/'.$sculpture->image)}}" width="100px" class="img-thubnail img-preview">
                  </td>
                  <td>
                      <a href="{{route('sculptures.edit',$sculpture->sculpture_id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
                       edit</a>
                       <a href="{{route('sculptures.show',$sculpture->sculpture_id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>

                        add language</a>

                      <form  action="{{route('sculptures.destroy',$sculpture->sculpture_id)}}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> delete</button>
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

