$(document).ready(function () {
    "use strict";

    $("select").select2();

    $(".js-example-basic-multiple-limit").select2({
        maximumSelectionLength: 2,
        ajax: {
            url: "/endpoint-ke-controller-laravel", // Ganti dengan URL yang sesuai
            dataType: "json",
            processResults: function (data) {
                return {
                    results: data,
                };
            },
        },
    });

    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [",", " "],
    });
});
