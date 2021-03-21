@if(Session::has('success'))
    <div class="p-4 bg-green-200 mb-4 rounded-lg">
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif
@if(Session::has('error'))
    <div class="p-4 bg-red-200 mb-4 rounded-lg">
        <strong>{{ Session::get('error') }}</strong>
    </div>
@endif