FROM debian:bullseye

# Mise à jour & dépendances PHP
RUN apt-get update && apt-get install -y \
    php php-cli php-mbstring php-xml php-bcmath php-curl php-mysql php-zip \
    php-common php-tokenizer php-fileinfo php-pdo unzip git curl nginx supervisor

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le dossier de travail
WORKDIR /var/www

# Exposer le port pour PHP-FPM si nécessaire (ex: si tu fais un serveur intégré)
EXPOSE 9000
