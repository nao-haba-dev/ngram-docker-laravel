# ベースイメージを指定
FROM php:8.0-fpm-buster
# コマンドのシェル形式に使用されるデフォルトのシェルをオーバーライド
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# 環境変数を設定
# COMPOSER_ALLOW_SUPERUSER 1を設定するとrootでのインストールを許可できる
ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# apt-get update インストール可能なパッケージの「一覧」を更新
# apt-get clean && \
  #  rm -rf /var/lib/apt/lists/* && \ パッケージインストールで使用したキャッシュを削除
RUN apt-get update && \
  apt-get -y install git unzip libzip-dev libicu-dev libonig-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath

# Node.js・NPMをインストール
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /work