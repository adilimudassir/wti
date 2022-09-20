<x-layouts.app>
    <x-slot name="title">
        Create Payment
    </x-slot>
    <x-card>
        <x-slot name="header">Form</x-slot>
        <x-slot name="body">
            @if($errors->any())
            <x-alert type="danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-alert>
            @endif
            <table class="table table-bordered border-2 border-primary table-secondary">
                <tbody>
                    <tr class="fw-bold fs-3">
                        <th class="w-25">Course</th>
                        <td>{{ $userCourse->course->title }}</td>
                    </tr>
                    <tr class="fw-bold fs-3">
                        <th class="w-25">Cost</th>
                        <td>{{ currency($userCourse->course->cost) }}</td>
                    </tr>
                    <tr class="fw-bold fs-3 text-success">
                        <th class="w-25">Total Paid</th>
                        <td>{{ currency($userCourse->totalPaymentsBalance()) }}</td>
                    </tr>
                    <tr class="fw-bold fs-3 text-danger">
                        <th class="w-25">Amount Due</th>
                        <td>{{ currency($userCourse->amountDue()) }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="separator my-10"></div>
            <div id="form">
                <p class="text-left fs-3">
                    Fill below to proceed to payment
                    <i class="fa fa-angle-down fa-xl mt-2 text-primary"></i>
                </p>
                <x-form method="POST" :route="route('payments.store')" :back-route="route('payments.index')" files>
                    <x-form.select name="payment_type" v-model="payment_type" label="Payment Type" :options="$paymentTypes" />
                    <x-form.select name="payment_method" v-model="payment_method" label="Payment Method" :options="$paymentMethods" />
                    <input type="hidden" name="amount" v-bind:value="amount">
                    <input type="hidden" name="user_course_id" value="{{ request()->user_course_id }}">
                    <div v-if="payment_method === 'Bank Transfer'">
                        <fieldset class="text-left p-3">
                            <legend>Account Details</legend>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Bank Name</th>
                                        <td>First Bank</td>
                                    </tr>
                                    <tr>
                                        <th>Account Name</th>
                                        <td>Wavecrest FX Academy</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number</th>
                                        <td>2035490452</td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <x-form.file name="receipt" label="Receipt" />
                    </div>
                    <h3 class="my-5 p-2 border">
                        <label for="staticEmail" class="form-label fs-6 fw-bolder text-dark mt-5">Amount to Pay</label>

                        <input type="text" readonly class="form-control-lg form-control-plaintext" v-bind:value="formatAsMoney(amount)">
                    </h3>
                </x-form>

            </div>
            <script src="https://unpkg.com/vue@next"></script>
            <script>
                Vue.createApp({
                    data() {
                        return {
                            payment_type: 'Complete',
                            payment_method: 'Online',
                            partial_payment_amount: 0,
                            amount: 0,
                            userCourse: null
                        }
                    },
                    watch: {
                        payment_type(value) {
                            this.amount = this.getAmount(value)
                        },
                    },
                    methods: {
                        getAmount(value) {
                            if (this.userCourse.course.allow_partial_payments && value === 'Partial') {
                                return this.partial_payment_amount;
                            }

                            if (this.userCourse.user.account_type === 'REGULAR STUDENT') {
                                return 50000;
                            }

                            // if (this.userCourse.user.account_type === 'Staff') {
                            //     return 0;
                            // }

                            return this.userCourse.course.cost;
                        },
                        formatAsMoney: (amount = 0) => {
                            return amount.toLocaleString(`en-NG`, {
                                style: "currency",
                                currency: "NGN"
                            });
                        },
                    },
                    mounted() {
                        this.userCourse = @json($userCourse);
                        const paymentTypes = @json($paymentTypes);
                        this.amount = this.getAmount(this.payment_type);
                        this.payment_type = Object.keys(paymentTypes)[0];
                        this.partial_payment_amount = parseFloat(@json($partialAmountToBePaid))
                    }
                }).mount('#form')
            </script>
        </x-slot>
    </x-card>
</x-layouts.app>