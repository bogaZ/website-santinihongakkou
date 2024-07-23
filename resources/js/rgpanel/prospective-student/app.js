import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";
import { clearError, showAlert, showError } from "../renderErrorInput";

$(function () {
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
