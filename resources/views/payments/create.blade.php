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
            <div id="form">
                <x-form method="POST" :route="route('payments.store')" :back-route="route('payments.index')" files>
                    <x-form.select name="payment_type" v-model="payment_type" label="Payment Type" :options="$paymentTypes" />
                    <x-form.select name="payment_method" v-model="payment_method" label="Payment Method" :options="$paymentMethods" />
                    <input type="hidden" name="amount" v-bind:value="amount">
                    <input type="hidden" name="user_course_id" value="{{ request()->user_course_id }}">
                    <div v-if="payment_method === 'Bank Transfer'">
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
                                return this.userCourse.course.cost / this.userCourse.course.partial_payments_allowed;
                            }
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
                    }
                }).mount('#form')
            </script>
        </x-slot>
    </x-card>
</x-layouts.app>