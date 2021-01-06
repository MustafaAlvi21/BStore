@component('mail::message')
# New Order

Hi Mr/Mrs **{{Session::get('orderFrom')}}**, you have new order.  

@component('mail::table')
| Product Name | Product Price | Quantity | Sub Total |
| ------------:|:-------------:|:--------:|: ---------|
| {{ Session::get('item')->name }} | Rs. {{ number_format(Session::get('item')->price) }} | {{ Session::get('item')->quantity }} | Rs. {{ number_format(((double) Session::get('item')->price) * ((int) Session::get('item')->quantity))  }}        |
@endcomponent

@component('mail::panel')
Total: <strong>Rs. {{ number_format(((double) Session::get('item')->price) * ((int) Session::get('item')->quantity))  }}</strong>
@endcomponent

Address: <br>
{{ Session::get("user_name") }}            
{{ Session::get("checkout.address").', '.Session::get("checkout.city").' '.Session::get("checkout.zip_code") }}, Pakistan <br>
{{ Session::get("user_phone") }} <br>
{{ Session::get("user_email") }} <br>



login to see more details. 

@component('mail::button', ['url' => $link])
Check Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
