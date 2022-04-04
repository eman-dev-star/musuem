@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>sculptures</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>

                <li><a href="{{route('sculptures.index')}}"><i class="fa fa-dashboard"></i>sculptures</a></li>
                <li class="active">add</li>
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
                <form action="{{route('sculptures.update',$sculpture[0]->sculpture_id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <input type="hidden" value="{{$sculpture[0]->sculpture_id}}" name="sculpture_id">
                  <div class="form-group">
                    <label>city</label>
                    <select name="city_id" class="form-control" id="city_id">
                        @foreach ($cities as $city)
                            <option value="{{ $city->city_id }}"
                                @if ($sculpture[0]->city_id == $city->city_id) selected="selected" @endif>
                                {{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>place</label>
                    <select name="place_id" class="form-control" id="place_id">
                        @foreach ($places as $place)
                            <option value="{{ $place->place_id }}"
                                @if ($sculpture[0]->place_id == $place->place_id) selected="selected" @endif>
                                {{ $place->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="form-group">
                    <label>place name</label>
                    <div id="place_name">
                    <input type="text" class="form-control" name="place_id"  value="{{$sculpture[0]->place_name}}">
                    </div>
                  </div> --}}
                  <div class="form-group">
                    <label>lang</label>
                    <select name="lang_id" class="form-control" onchange="getSculpture({{$sculpture[0]->sculpture_id}},this.value)">
                       <option value="">please selecet your lang</option>

                       @foreach($languages as $lang)
                       <option value="{{$lang->id}}"
                        @if($sculpture[0]->lang_id==$lang->id)
                        selected="selected"
                        @endif
                        >{{$lang->language}}</option>
                       @endforeach
                    </select>
                     </div>

                <div class="form-group">
                  <label>name</label>
                  <div id="name">
                  <input type="text" class="form-control" name="name" value="{{$sculpture[0]->sculpture_name}}">
                </div>
                </div>
                <div class="form-group">
                    <label>code</label>
                    <input type="text" class="form-control" name="code" value="{{$sculpture[0]->code}}">
                  </div>
                  <div class="form-group">
                    <label>image</label>
                    <input type="file" class="form-control image" name="image">
                  </div>
                   <div class="form-group">
                    <img src="{{asset('uploads/sculpture/'.$sculpture[0]->image)}}" width="100px" class="img-thubnail img-preview">
                  </div>
                </div>
                 <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>edit</button>
              </div>



        </form>
        </div><!--end of box-body-->
         </div><!--end of box-primary-->
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
<script>
    function getSculpture(sculpture_id,lang_id){

$.ajax({

   type:'GET',

   url:"/sculpture_lang/"+lang_id+"/"+sculpture_id,
dataType:'json',

   success:function(data){

      $("#name").html(data);


   }


});

    }
</script>
