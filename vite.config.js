import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import copy from "rollup-plugin-copy";

export default defineConfig({
    build: {
        outDir: "public/assets",
        rollupOptions: {
            output: {
                entryFileNames: "[name].js",
                chunkFileNames: "[name].js",
                assetFileNames: "[name].[ext]",
                preserveModules: true,
            },
        },
    },
    plugins: [
        laravel(["resources/js/*.js"]),
        copy({
            targets: [{ src: "resources/js/*.js", dest: "public/assets/js" }],
            hook: "writeBundle",
        }),
    ],
});
