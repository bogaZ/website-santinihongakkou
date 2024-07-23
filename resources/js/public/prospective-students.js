import "dropify/src/js/dropify";
import "dropify/dist/css/dropify.min.css";
const dropifyInit = () => {
    if ($(".dropify").length < 1) return false;
    $(".dropify").each(function () {
        const placeholder = $(this).data("placeholder");
        $(this).dropify({
            messages: {
                default: placeholder
                    ? placeholder
                    : "Drag and drop a file here or click",
            },
        });
    });
};
$(function () {
    dropifyInit();
});
