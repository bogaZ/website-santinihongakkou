import "dropify/src/js/dropify";
import "dropify/dist/css/dropify.min.css";
import { clearError, showAlert, showError } from "../renderErrorInput";
$(function () {
    $(".dropify").dropify();
    $(document).on("submit", ".js-form-banner", function (e) {
        e.preventDefault();
        const formData = new FormData($(this)[0]);
        const url = $(this).attr("action");
        clearError();
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                setTimeout(() => {
                    window.location.href = $(".js-btn-back").attr("href");
                }, 300);
            },
            error: function ({ status, responseJSON }) {
                if (status === 422) {
                    const errors = responseJSON.errors;
                    for (const fieldName in errors) {
                        const errorMessage = errors[fieldName][0];
                        showError(fieldName, errorMessage);
                    }
                }
                showAlert(
                    "danger",
                    responseJSON.message,
                    document.querySelector(".js-form-banner")
                );
            },
        });
    });
});
