<div>
    @include('sweetalert::alert')
    <x-card>
        <x-slot name="header">
            <p>
                Course Status
                <small class="mx-2 badge badge-light-danger">{{ $userCourse->status() }} </small>
            </p>
        </x-slot>
        <x-slot name="body">
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Started</legend>
                {!! $userCourse->started_at?->diffForHumans() ?? 'Not Yet' !!}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Finished</legend>
                {!! $userCourse->finished_at?->diffForHumans() ?? 'Not Yet' !!}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Progress</legend>
                {!! $userCourse->progress() !!}% completed
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Current Topic</legend>
                {!! $userCourse->activeTopic()->title !!}
            </fieldset>
            <fieldset class="border p-5 mb-5">
                <legend class="text-muted">Current level</legend>
                {{ $userCourse->activeTopic()->level->title }} ({{ $userCourse->activeTopic()->level->name }} Level)
            </fieldset>

        </x-slot>
    </x-card>

    <x-card>
        <x-slot name="header">
            Payments
            <small class="mx-2 badge badge-light-danger">{{ $userCourse->paymentStatus() }} </small>
        </x-slot>
        <x-slot name="toolbar">
            @if($userCourse->canMakePayment())
            <x-button name="make payment" :href="route('payments.create', ['user_course_id' => $userCourse->id])" permission="create-payments" class="btn btn-sm btn-primary" icon="bi bi-plus" />
            @endif
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive">
                <table class="table table-rounded table-striped border gy-7 gs-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                            <th>Amount Paid</th>
                            <th>Amount Due</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Method</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userCourse->payments as $payment)
                        <tr>
                            <td>{{ currency($payment->amount) }}</td>
                            <td>{{ currency($payment->amountDue()) }}</td>
                            <td>
                                <span class="badge badge-primary">
                                    {{ $payment->status() }}
                                </span>
                            </td>
                            <td>{{ $payment->type }}</td>
                            <td>{{ $payment->method }}</td>
                            <td>{{ $payment->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-card>
</div>