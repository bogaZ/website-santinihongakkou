import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";
import "dropify/src/js/dropify";
import "dropify/dist/css/dropify.min.css";
import {
    clearError,
    showAlert,
    showError,
} from "../../../../../resources/js/rgpanel/renderErrorInput.js";
$(function () {
    $(".dropify").dropify();
    $(document).on("submit", ".js-form", function (e) {
        e.preventDefault();
        const formData = new FormData($(this)[0]);
        const url = $(this).attr("action");
        clearError();
        const formElement = document.querySelector(".js-form");
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
                    window.location.reload();
                }, 300);
            },
            error: function ({ status, responseJSON }) {
                showAlert("danger", responseJSON.message, formElement);
                if (status === 422) {
                    const errors = responseJSON.errors;
                    for (const fieldName in errors) {
                        const errorMessage = errors[fieldName][0];
                        showError(fieldName, errorMessage);
                    }
                }
            },
        });
    });
});
