@component('mail::message')
# Thanks for buying

Enjoy your event

This is your event link :
@foreach ($mailData as $item)
{{ $loop->iteration }}. {{  $item['ticket_name'] }} : {{ $item['ticket_link'] }}
@endforeach

{{-- {{ $mailData['title'] }} --}}


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
