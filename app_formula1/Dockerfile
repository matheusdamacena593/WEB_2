FROM php:8.3-fpm

# Define o locale para evitar avisos e evita prompts interativos
ENV LC_ALL C.UTF-8
ENV DEBIAN_FRONTEND=noninteractive

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    gnupg \
    # Dependências para extensões PHP
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev

# Instala extensões PHP comuns para Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo pdo_mysql pdo_pgsql mbstring zip opcache exif pcntl bcmath gd

# Instala o Composer (gerenciador de dependências do PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala Node.js e npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Configura o PHP para produção/desenvolvimento
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
 && sed -E -i -e 's/max_execution_time = 30/max_execution_time = 120/' "$PHP_INI_DIR/php.ini" \
 && sed -E -i -e 's/memory_limit = 128M/memory_limit = 512M/' "$PHP_INI_DIR/php.ini" \
 && sed -E -i -e 's/post_max_size = 8M/post_max_size = 64M/' "$PHP_INI_DIR/php.ini" \
 && sed -E -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 64M/' "$PHP_INI_DIR/php.ini"

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia todos os arquivos do projeto Laravel para o container
# Para um melhor aproveitamento do cache, copie primeiro os arquivos de dependência
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-scripts --optimize-autoloader

COPY package.json package-lock.json* ./
RUN npm install

COPY . . 

# RUN npm run build

# Roda o composer install novamente para executar os scripts e compila os assets
RUN composer install --no-interaction --optimize-autoloader

# Gera a chave da aplicação
RUN cp .env.example .env \
    && php artisan key:generate

# Ajusta as permissões das pastas do Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expõe a porta que o php-fpm escuta
EXPOSE 9000

# Comando padrão para iniciar o container
CMD ["php-fpm"]
