<x-mail::message>
# Introduction

Welcome In Laravel-Project {{$name}};

<x-mail::panel>
Your Email Is {{$email}};
<br>
Your password Is {{$password}};
</x-mail::panel>

<x-mail::button :url="'http://127.0.0.1:8000/cms/admin'">
Click Here To redirct project
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
