module.exports = {
  plugins: {
    'autoprefixer': {},
    'cssnano': {
      preset: [
        'default',
        {
          discardComments: {
            removeAll: true
          }
        }
      ]
    },
    'postcss-custom-properties': {},
    'postcss-dialog-polyfill': {}
  }
}