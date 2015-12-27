# 样式开发说明

样式源代码均由 SCSS `<src/*.scss>` 写成，通过 ruby-sass 编译到 CSS 文件，由 gulp 完成自动化构建。



# 开发环境准备

> 涉及命令皆在此说明文件所在目录执行。

## 基础环境

- io.js/node.js
- npm
- ruby

## ruby-sass

Linux :

    #gem install sass

其他平台：参见 [http://sass-lang.com/install](http://sass-lang.com/install)

## node 模块依赖

    #npm install

至此环境准备完成。



# 开始构建

> 涉及命令皆在此说明文件所在目录执行。

将 SCSS 源文件编译到最小化的 CSS。

## 一次性构建

编译所有 SCSS 文件。

    $gulp styles

## 持续监视

gulp 会持续监视所有 SCSS 文件的变动，在发生变动的时候立即进行一次编译，并继续监视，按下 `ctrl+C` 可停止监视。

在开发过程中推荐使用此方式。

    $gulp watch
