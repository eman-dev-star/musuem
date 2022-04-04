@extends('layouts.admin')
@section('content')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>cities</h1>


            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{route('languages.index')}}"><i class="fa fa-dashboard"></i>cities</a></li>
                <li class="active">add</li>
              </ol>
        </section>

        <section class="content">
          <!-- general form elements -->
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                @include('partials._error')
                <form action="{{route('cities.update',$city[0]->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="city_id" value="{{$city[0]->id}}">

                  <div class="form-group">
                    <label>lang</label>
                    <select name="lang_id" class="form-control" onchange="getCity({{$city[0]->id}},this.value)">
                       <option value="">Please select language</option>

                       @foreach($languages as $lang)
                       <option value="{{$lang->id}}"
                        @if($city[0]->lang_id==$lang->id)
                        selected="selected"
                        @endif
                        >{{$lang->language}}</option>
                       @endforeach
                    </select>
                     </div>


                <div class="form-group">
                  <label>name</label>
                  <div id="city_name">
                  <input type="text" class="form-control" name="name"  value="{{$city[0]->city_name}}">
                  </div>
                </div>
                 <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>EDIT</button>
              </div>



        </form>
        </div><!--end of box-body-->
         </div><!--end of box-primary-->
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

<script>
    function getCity(city_id,lang_id){
$.ajax({

   type:'GET',

   url:"/city_lang/"+lang_id+"/"+city_id,

//    data:{lang_id:lang_id, city_id:city_id},
dataType:'json',

   success:function(data){

      $("#city_name").html(data['city']);

   }


});

    }
</script>
