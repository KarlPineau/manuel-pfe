import { resolve } from 'path'

export default {
  root: '.',
  publicDir: false,
  build: {
    outDir: 'dist',
    emptyOutDir: false,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'assets/scss/main.scss'),
        print: resolve(__dirname, 'assets/scss/print.scss'),
      },
      output: {
        assetFileNames: 'assets/css/[name].css'
      }
    }
  }
}
