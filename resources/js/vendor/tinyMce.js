import tinymce from "tinymce/tinymce";
import "tinymce/themes/silver/theme.min.js";
import "tinymce/icons/default/index";
import "tinymce/models/dom/index";
import "tinymce/skins/ui/oxide/skin.min.css";
import "tinymce/skins/ui/oxide/content.min.css";
import "tinymce/plugins/image";
import "tinymce/plugins/preview";
import "tinymce/plugins/importcss";
import "tinymce/plugins/searchreplace";
import "tinymce/plugins/autolink";
import "tinymce/plugins/directionality";
import "tinymce/plugins/code";
import "tinymce/plugins/visualblocks";
import "tinymce/plugins/visualchars";
import "tinymce/plugins/fullscreen";
import "tinymce/plugins/link";
import "tinymce/plugins/codesample";
import "tinymce/plugins/table";
import "tinymce/plugins/charmap";
import "tinymce/plugins/pagebreak";
import "tinymce/plugins/nonbreaking";
import "tinymce/plugins/anchor";
import "tinymce/plugins/insertdatetime";
import "tinymce/plugins/advlist";
import "tinymce/plugins/lists";
import "tinymce/plugins/wordcount";
import "tinymce/plugins/emoticons";
import "tinymce/plugins/accordion";

const tinyConfig = {
    menubar: false,
    // content_css: false,
    skin: false,
    plugins:
        "preview importcss searchreplace autolink directionality code visualblocks visualchars fullscreen image link codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount accordion",
    selector: "textarea.tiny-default",
    toolbar:
        "undo redo | accordion blocks | fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table | lineheight outdent indent| forecolor backcolor removeformat | charmap  code  preview |  print | pagebreak fullscreen",
    block_unsupported_drop: false,
    images_upload_url: $(".tiny-default").data("uploadurl"),
    images_upload_credentials: true,
    // images_upload_handler: (blobInfo, progress) =>
    //     new Promise((resolve, reject) => {
    //         const xhr = new XMLHttpRequest();
    //         xhr.withCredentials = false;
    //         xhr.open("POST", $(".tiny-default").data("uploadurl"));

    //         xhr.upload.onprogress = (e) => {
    //             progress((e.loaded / e.total) * 100);
    //         };

    //         xhr.onload = () => {
    //             if (xhr.status === 403) {
    //                 reject({
    //                     message: "HTTP Error: " + xhr.status,
    //                     remove: true,
    //                 });
    //                 return;
    //             }

    //             if (xhr.status < 200 || xhr.status >= 300) {
    //                 reject("HTTP Error: " + xhr.status);
    //                 return;
    //             }

    //             const json = JSON.parse(xhr.responseText);

    //             if (!json || typeof json.location != "string") {
    //                 reject("Invalid JSON: " + xhr.responseText);
    //                 return;
    //             }

    //             resolve(json.location);
    //         };

    //         xhr.onerror = () => {
    //             reject(
    //                 "Image upload failed due to a XHR Transport error. Code: " +
    //                     xhr.status
    //             );
    //         };

    //         const formData = new FormData();
    //         formData.append("file", blobInfo.blob(), blobInfo.filename());
    //         formData.append(
    //             "_token",
    //             $('meta[name="csrf-token"]').attr("content")
    //         );
    //         xhr.send(formData);
    //     }),
    file_picker_callback: (cb, value, meta) => {
        const input = document.createElement("input");
        input.setAttribute("type", "file");
        input.setAttribute("accept", "image/*");

        input.addEventListener("change", (e) => {
            const file = e.target.files[0];

            const reader = new FileReader();
            reader.addEventListener("load", () => {
                const id = "blobid" + new Date().getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(",")[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
            });
            reader.readAsDataURL(file);
        });

        input.click();
    },
};
document.addEventListener("focusin", (e) => {
    if (
        e.target.closest(
            ".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root"
        ) !== null
    ) {
        e.stopImmediatePropagation();
    }
});
export { tinyConfig, tinymce };
