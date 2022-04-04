{{-- @if (session('success'))

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif

@if (session('error'))

    <script>
        new Noty({
            type: 'danger',
            layout: 'topRight',
            text: "{{ session('error') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif --}}
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block center" style="text-align: center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" style="text-align: center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block" style="text-align: center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block" style="text-align: center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger" style="text-align: center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :(
</div>
@endif
