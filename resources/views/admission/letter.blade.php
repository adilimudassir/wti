@component('mail::message')
Dear {{ $userCourse->user->name }},

#  ADMISSION OFFER TO {{ config('app.name') }}

We are pleased to inform you that you have been offered admission into {{ config('app.name') }} to acquire the professional skill sets in trading the Global Financial Market.

**Course:** {{ $userCourse->course->title }}

**Duration:** {{ $userCourse->course->duration }}

We congratulate you on your admission and welcome you to {{ config('app.name') }}, where we Educate, Enrich and Empower. Our academy offers exceptional training and qualitative e-learning platform where you acquire the professional skill sets and expertise to trade the largest financial markets in the world.

You are required to always attend all classes, be rightly updated and ensure to always take notes while attending the classes. We look forward to see you in the classroom.

Once again, congratulations. Your acknowledgement of this letter will definitely be appreciated and welcomed.

**Matriculation Number:** {{ $userCourse->matriculation_number }}

*Your matriculation number will be used to access your classroom*

@component('mail::button', ['url' => route('classroom.index'), 'color' => 'red'])
Go to E-classroom
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent