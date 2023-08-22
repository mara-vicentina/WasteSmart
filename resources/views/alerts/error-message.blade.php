@if (Session::has('error_message'))
<div>
    <p class="text-danger">{{ Session::get('error_message') }}</p>
</div>
@endif