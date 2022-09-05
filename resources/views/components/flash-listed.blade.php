@if(session()->has("listing"))
    <div x-data="popup: true" x-unit="setTimeout(()=> popup = false), 3000)" x-show="popup" class="fixed top-9 transform bg-laravel left-1/2 -translate-x-1/2 bg-laravel text-white px-48 py-3">
      <p>{{session("listing")}}</p>
    </div>
@endif

@if(session()->has("user"))
    <div x-data="popup: true" x-unit="setTimeout(()=> popup = false), 3000)" x-show="popup" class="fixed top-9 transform bg-laravel left-1/2 -translate-x-1/2 bg-laravel text-white px-48 py-3">
      <p>{{session("user")}}</p>
    </div>
@endif