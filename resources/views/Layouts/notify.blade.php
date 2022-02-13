@if(session('success')) 
<div class="col-md-12 mt-2 alert alert-success" style="color:#fff">
  <i class="icon fas fa-check-circle"></i> {{session('success')}}
  </div>
@endif

@if(session('fail')) 
  <div class="col-md-12 mt-2" style="color:red">
  <i class="icon fas fa-info-circle"></i> {{session('fail')}}
  </div>
@endif

@if(session('warning')) 
  <div class="col-md-12 mt-2" style="color:orange">
  <i class="icon fas fa-info-circle"></i> {{session('warning')}}
  </div>
@endif

@if(session('info')) 
  <div class="col-md-12 mt-2" style="color:blue">
  <i class="icon fas fa-info-circle"></i> {{session('info')}}
  </div>
@endif