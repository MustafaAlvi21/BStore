@component('mail::message')
# Order Details

Hi Mr/Mrs **{{$name}}**, your order placed successfully, order id is **{{$order_id}}**.  
@component('mail::table')
| Product Name | Product Price | Quantity | Sub Total |
| ------------:|:-------------:|:--------:|: ---------|
|@foreach(Session::get("my_cart") as $item)|
| {{ $item->name }} | Rs. {{ number_format($item->price) }} | {{ $item->quantity }} | Rs. {{ number_format(((double) $item->price) * ((int) $item->quantity))  }}        |
@endforeach
@endcomponent

@component('mail::panel')
Total: <strong>Rs. {{number_format(Session::get("g_total"))}}</strong>
@endcomponent
Address: <br>
{{ Auth::user()->name }}            
{{ Session::get("checkout.address").', '.Session::get("checkout.city").' '.Session::get("checkout.zip_code") }}, Pakistan <br>
{{ Auth::user()->phone }} <br>
{{ Auth::user()->email }} <br>

login to see more details. 

@component('mail::button', ['url' => $link])
Check Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
