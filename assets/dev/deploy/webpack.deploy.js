const path = require("path");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = () => {
  return {
    entry: path.resolve(__dirname, "../src/main.js"),
    output: {
      path: path.resolve(__dirname, "tmp/dist"),
      filename: "js/[name].bundle.js",
      publicPath: "/wp-content/themes/trc/assets/dist/"
    },
    devtool: false,
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader",
            options: {
              presets: [
                ["@babel/preset-env", {
                  modules: false,
                  useBuiltIns: 'usage',
                  corejs: 3,
                  targets: {
                    browsers: ['last 2 versions', '> 1%', 'ie 11']
                  }
                }]
              ],
              "plugins": [
                ["@babel/plugin-transform-runtime", {
                  helpers: false
                }],
                "@babel/plugin-proposal-class-properties"
              ]
            }
          }
        },
        {
          test: /\.scss$/,
          use: [
            "css-hot-loader",
            {
              loader: MiniCssExtractPlugin.loader,
              options: {
                publicPath: "/css"
              }
            },
            {
              loader: "css-loader",
              options: {
                url: false,
                modules: 'global',
                importLoaders: 2
              }
            },
            {
              loader: "sass-loader",
              options: {
                sourceMap: false
              }
            }
          ]
        }
      ]
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: "css/[name].bundle.css"
      }),
      new CleanWebpackPlugin()
    ],
    optimization: {
      minimizer: [
        new CssMinimizerPlugin()
      ]
    }
  };
}