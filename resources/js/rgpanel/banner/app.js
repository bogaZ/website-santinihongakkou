import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";
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
});
