@if(session()->has("listed"))
    <div x-data="popup: true" x-unit="setTimeout(()=> popup = false, 3000)" x-show="popup" fixed top-9 transform bg-laravel left-1/2 -translate-x-1/2 bg-laravel text-white px-48 py-3">
      <p>{{session("listed")}}</p>
    </div>
@endif