module.exports = {
  extends: [
    "plugin:@wordpress/eslint-plugin/recommended-with-formatting", // Uses the recommended WordPress ESLint rules
    "prettier",
  ],
  rules: {
    // Add your custom rules here, e.g.,
    "no-console": "warn", // Warns when console.log is used
  },
};
