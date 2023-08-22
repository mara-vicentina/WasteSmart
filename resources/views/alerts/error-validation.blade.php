@if(count($errors) > 0)
<div>
  @foreach($errors->all() as $error)
    <p class="text-danger d-block">{!! $error !!}</p>
  @endforeach
</div>
@endif