@component('mail::message')
<h1>Welcome {{ $data['data']->nom.' '.$data['data']->prenom }}</h1>

@component('mail::button', ['url' => url('admin/newPassword/'.$data['token'])])
click here to reset your password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
