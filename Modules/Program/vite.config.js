const dotenvExpand = require("dotenv-expand");
dotenvExpand(
    require("dotenv").config({ path: "../../.env" /*, debug: true*/ })
);

import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
const path = require("path");
export default defineConfig({
    build: {
        outDir: "../../public/modules/build/program",
        emptyOutDir: true,
        manifest: true,
    },
    plugins: [
        laravel({
            publicDirectory: "../../public",
            buildDirectory: "modules/build/program",
            input: [
                __dirname + "/Resources/assets/sass/app.scss",
                __dirname + "/Resources/assets/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
