@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>cities</h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="{{route('cities.index')}}">cities</li>

            </ol>
        </section>


        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              {{-- <h3 class="box-title" style="margin-bottom: 15px">cities<small>{{$cities->total()}}</small></h3> --}}

                <div class="row">
                      <div class="col-md-4">

                         <a href="{{route('cities.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hcity_idden="true"></i>add</a>

                    </div>
                </div>

            </div>
            <!-- /.box-header -->
             <div class="box-body">

                 <table class="table table-hover">
                  <thead>
                <tr>
                  <th style="wcity_idth: 10px">#</th>
                 <th>name</th>
                 <th>lang</th>
                 <td>action</td>
                </tr>
                  </thead>
              <tbody>
                @foreach($cities as $index=>$city)
                <tr>
                  <td>{{$index+1}}</td>
                  {{-- <td>{{$city->langs->language}}</td>

                  <td>{{$city->langs->language}}</td> --}}
                  <td>{{$city->city_name}}</td>
                  <td>{{$city->lang_name}}</td>

                  <td>

                      <a href="{{route('cities.edit',$city->city_id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hcity_idden="true"></i>
                       edit</a>
                       <a href="{{route('cities.show',$city->city_id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hcity_idden="true"></i>

                        add language</a>

                      <form  action="{{route('cities.destroy',$city->city_id)}}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash-o" aria-hcity_idden="true"></i> delete</button>
                    </form>


                  </td>
                </tr>
                @endforeach
            </tbody>

              </table>

              </div>
              {{-- {{$cities->appends(request()->query())->links()}} --}}
              <!-- box-body -->

          </div>
          <!-- box -->



        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
