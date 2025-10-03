<x-mail::message>
# {{ $name }}

Your appointment has been confirmed. Here are the details: {{ $appointment }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
