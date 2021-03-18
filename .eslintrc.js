module.exports = {
  root: true,
  env: {
    browser: true,
    node: true,
  },
  parserOptions: {
    parser: 'babel-eslint',
  },
  extends: [
    '@nuxtjs',
    'plugin:nuxt/recommended',
  ],
  plugins: [
  ],
  // add your custom rules here
  rules: {
    'comma-dangle': [ 'error', 'always-multiline' ],
    curly: [ 'error', 'multi' ],
    'no-console': 'off',
    camelcase: 'off',
    'array-bracket-spacing': [ 'error', 'always' ],
    'vue-html-closing-bracket-newline': 0,
    'vue/comment-directive': 'off'
  },
}
