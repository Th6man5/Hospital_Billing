# Gunakan image dasar PHP dengan Apache
FROM php:8.1-apache

# Install ekstensi PHP yang dibutuhkan
RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring

# Copy aplikasi ke dalam container
COPY . /var/www/html

# Set folder kerja
WORKDIR /var/www/html

# Berikan izin ke folder
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port aplikasi
EXPOSE 80
