FROM php:8.1-cli


RUN apt-get update && apt-get install --quiet --yes --no-install-recommends \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip
    
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY ../.. .

# RUN groupadd --gid 1000 appuser \
#     && useradd --uid 1000 -g appuser \
#     -G www-data,root --shell /bin/bash \
#     --create-home appuser

# USER appuser

ENV PORT=8000

ENTRYPOINT [ ".docker/php/entrypoint.sh" ]