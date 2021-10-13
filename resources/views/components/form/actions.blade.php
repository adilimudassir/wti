@props([
'label' => $label ?? 'Submit',
'message' => $message ?? 'Please wait...',
'backRoute' => $backRoute ?? route('dashboard')
])

@aware(['backRoute' => $backRoute ?? route('dashboard')])


<!--begin::Indicator-->

<!--end::Indicator-->

<div class="d-flex justify-content-between g-2">
    <a class="btn btn-light-primary btn-sm" href="{{ $backRoute }}">Back</a>
    <button type="submit" id="kt_submit_button" class="btn btn-primary btn-sm fw-bolder me-4">
        <span class="indicator-label">
            {{ $label }}
        </span>
        <span class="indicator-progress">
            {{ $message }}
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>
</div>

<script>
    // Element to indecate
    var button = document.querySelector("#kt_submit_button");

    // Handle button click event
    button.addEventListener("click", function() {
        // Activate indicator
        button.setAttribute("data-kt-indicator", "on");

        // Disable indicator after 3 seconds
        setTimeout(function() {
            button.removeAttribute("data-kt-indicator");
        }, 3000);
    });
</script>