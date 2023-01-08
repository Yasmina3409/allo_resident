// const { defineConfig } = require('@vue/cli-service')
// module.exports = defineConfig({
//   transpileDependencies: true
// })
// module.exports = {
//   baseUrl: "./"
// };
module.exports = {
  publicPath: process.env.NODE_ENV === 'production' ? '/allo_resident/' : '/'
}