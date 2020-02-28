module.exports = ({ options, env }) => ({
  plugins: {
    'autoprefixer': {},
    'cssnano': env === 'production' ? options.cssnano : false,
    'postcss-dialog-polyfill': {}
  }
})