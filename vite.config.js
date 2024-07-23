import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
const rgpanel = [
    "resources/js/app.js",
    "resources/js/rgpanel/app.js",
    "resources/js/rgpanel/auth.js",
    "resources/js/rgpanel/banner/app.js",
    "resources/js/rgpanel/banner/form.js",
    "resources/js/rgpanel/user/index.js",
    "resources/js/rgpanel/prospective-student/app.js",
    "resources/js/rgpanel/gallery/app.js",
    "resources/js/rgpanel/organization-structure/app.js",
    "resources/js/rgpanel/service/app.js",
    "resources/css/rgpanel/app.scss",
];
export default defineConfig({
    resolve: {
        alias: {
            "@": "/resources/js",
            "@modules": "/Modules",
        },
    },
    plugins: [
        laravel({
            input: [
                ...rgpanel,
                // PUBLIC
                "resources/css/public/tailwind.scss",
                "resources/css/public/icons.scss",
                "resources/css/public/tinymce.scss",
                "resources/js/public/home.js",
                "resources/js/public/aos-animation.js",
                "resources/js/public/prospective-students.js",
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    tinymce: [
                        "tinymce/tinymce",
                        "tinymce/themes/silver/theme.min.js",
                        "tinymce/icons/default/index",
                        "tinymce/models/dom/index",
                        "tinymce/skins/ui/oxide/skin.min.css",
                        "tinymce/skins/ui/oxide/content.min.css",
                        "tinymce/plugins/image",
                        "tinymce/plugins/preview",
                        "tinymce/plugins/importcss",
                        "tinymce/plugins/searchreplace",
                        "tinymce/plugins/autolink",
                        "tinymce/plugins/directionality",
                        "tinymce/plugins/code",
                        "tinymce/plugins/visualblocks",
                        "tinymce/plugins/visualchars",
                        "tinymce/plugins/fullscreen",
                        "tinymce/plugins/link",
                        "tinymce/plugins/codesample",
                        "tinymce/plugins/table",
                        "tinymce/plugins/charmap",
                        "tinymce/plugins/pagebreak",
                        "tinymce/plugins/nonbreaking",
                        "tinymce/plugins/anchor",
                        "tinymce/plugins/insertdatetime",
                        "tinymce/plugins/advlist",
                        "tinymce/plugins/lists",
                        "tinymce/plugins/wordcount",
                        "tinymce/plugins/emoticons",
                        "tinymce/plugins/accordion",
                    ],
                },
            },
        },
    },
});
