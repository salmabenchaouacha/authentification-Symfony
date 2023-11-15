FROM php:8.2-apache

# Installation des dépendances
RUN apt-get update \
    && apt-get install -y \
        git \
        libzip-dev \
        unzip \
    && docker-php-ext-install zip pdo_mysql

# Activation du module Apache "rewrite"
RUN a2enmod rewrite

# Copie du code source du projet dans le conteneur
COPY . /var/www/html

# Configuration du document root Apache
RUN sed -i -e 's/html/html\/public/g' /etc/apache2/sites-available/000-default.conf

# Définition de l'utilisateur Apache comme propriétaire des fichiers
RUN chown -R www-data:www-data /var/www/html

# Installation des dépendances du projet avec Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/html && composer install --no-scripts --no-autoloader
# Exécution des scripts Composer
RUN cd /var/www/html && composer dump-autoload --optimize

# Définir le répertoire de travail
WORKDIR /var/www/html

# Exposer le port 80
EXPOSE 80

# Commande par défaut pour démarrer Apache en premier plan
CMD ["apache2-foreground"]
