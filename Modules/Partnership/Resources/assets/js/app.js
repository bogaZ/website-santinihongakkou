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
    $(document).on("click", ".js-btn-modal-open", function () {
        const action = $(this).data("action");
        $.ajax({
            type: "get",
            url: action,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function ({ data }) {
                $("#modalForm .modal-body").html(data);
                $(".dropify").dropify();
            },
            error: function ({ responseJSON, status }) {
                Swal.fire({
                    title: responseJSON.title,
                    text: responseJSON.message,
                    icon: "error",
                    confirmButtonText: responseJSON.action,
                });
            },
        });
    });
    $(document).on("click", ".js-btn-submit", function () {
        $(".js-form").trigger("submit");
    });
    $(document).on("submit", ".js-form", function (e) {
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
                    window.location.reload();
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
                    document.querySelector(".js-form")
                );
            },
        });
    });
    $(document).on("click", ".js-btn-delete", function () {
        const url = $(this).data("url");
        Swal.fire({
            title: $(this).data("title"),
            showCancelButton: true,
            confirmButtonText: $(this).data("btn-label"),
            cancelButtonText: $(this).data("btn-cancel-label"),
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: url,
                    contentType: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 300);
                    },
                    error: function ({ responseJSON, status }) {
                        Swal.fire({
                            title: responseJSON.title,
                            text: responseJSON.message,
                            icon: "error",
                            confirmButtonText: responseJSON.action,
                        });
                    },
                });
            }
        });
    });

    $(document).on("click", ".js-btn-edit", function () {
        const url = $(this).data("url");
        $.ajax({
            type: "get",
            url: url,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function ({ data }) {
                $("#modalForm .modal-body").html(data);
                $(".dropify").dropify();
            },
            error: function ({ responseJSON, status }) {
                Swal.fire({
                    title: responseJSON.title,
                    text: responseJSON.message,
                    icon: "error",
                    confirmButtonText: responseJSON.action,
                });
            },
        });
    });
});