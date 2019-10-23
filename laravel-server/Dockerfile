FROM composer:1.9.0 as composer
ARG VENDOR_DIR
ENV VENDOR_DIR $VENDOR_DIR
WORKDIR /var/www/html
RUN mkdir -p ${VENDOR_DIR}

COPY ./laravel-application ./
RUN yes | composer install
VOLUME $VENDOR_DIR

FROM nginx:1.17.4-alpine
ARG VENDOR_DIR
ENV VENDOR_DIR $VENDOR_DIR
COPY ./environment-config/nginx/conf.d/app.conf /etc/nginx/conf.d/default.conf
COPY ./laravel-application/ /var/www/html
COPY --from=composer ${VENDOR_DIR} ${VENDOR_DIR}

HEALTHCHECK --interval=5s --timeout=1s \
     CMD ping localhost:8080 || exit 1