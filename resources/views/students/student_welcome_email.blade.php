<x-mail::message>
# Introduction

Hello Dear Student {{$name}};
<x-mail::panel>
Your Email: {{$email}};
Your Id:{{$id}}
{{-- The Response:{{$response}} --}}
</x-mail::panel>

<x-mail::button :url="'http://127.0.0.1:8000/cms/admin/studentid'">
click To See More
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
