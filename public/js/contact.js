// ===== Contact page script: client-side form validation (no data is sent anywhere) =====
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('contact-form');
    var success = document.getElementById('form-success');
    if (!form) return;

    var EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

    // Rules for each field: the message to show when it's empty, plus any extra check
    var rules = {
        name: { empty: 'Please enter your full name.' },
        email: {
            empty: 'Please enter your email address.',
            check: function (value) {
                return EMAIL_PATTERN.test(value)
                    ? ''
                    : 'Please enter a valid email address (e.g. you@example.com).';
            },
        },
        subject: { empty: 'Please enter a subject.' },
        message: { empty: 'Please enter your message.' },
    };

    function getError(input) {
        var rule = rules[input.name];
        var value = input.value.trim();
        if (value === '') return rule.empty;
        return rule.check ? rule.check(value) : '';
    }

    function showResult(input, message) {
        var field = input.closest('.form-field');
        var errorEl = document.getElementById(input.name + '-error');

        errorEl.textContent = message;
        field.classList.toggle('has-error', message !== '');
        field.classList.toggle('is-valid', message === '');
        input.setAttribute('aria-invalid', message !== '' ? 'true' : 'false');
    }

    function validate(input) {
        var message = getError(input);
        showResult(input, message);
        return message === '';
    }

    function clearState(input) {
        var field = input.closest('.form-field');
        field.classList.remove('has-error', 'is-valid');
        input.removeAttribute('aria-invalid');
        document.getElementById(input.name + '-error').textContent = '';
    }

    var inputs = Array.prototype.slice.call(
        form.querySelectorAll('input, textarea'),
    );

    inputs.forEach(function (input) {
        // Re-check a field as the user types once it has been checked before,
        // so error messages disappear (or change) as soon as the input is fixed.
        input.addEventListener('input', function () {
            if (!success.hidden) success.hidden = true;
            if (input.hasAttribute('aria-invalid')) validate(input);
        });

        // Check a field when the user leaves it, but only if they typed something
        input.addEventListener('blur', function () {
            if (input.value.trim() !== '' || input.hasAttribute('aria-invalid'))
                validate(input);
        });
    });

    form.addEventListener('submit', function (event) {
        // Always stop the real submission: this assignment only needs client-side validation
        event.preventDefault();

        var firstInvalid = null;
        inputs.forEach(function (input) {
            if (!validate(input) && !firstInvalid) firstInvalid = input;
        });

        if (firstInvalid) {
            success.hidden = true;
            firstInvalid.focus();
            return;
        }

        // All fields are valid: show the success message and reset the form
        form.reset();
        inputs.forEach(clearState);
        success.hidden = false;
        success.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    });
});
