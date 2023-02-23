FROM ubuntu 
RUN apt clean 
RUN apt update -y 
RUN apt install -y tzdata
RUN apt install -y php
RUN apt install -y php-mysql
RUN apt install -y apache2 
RUN apt install -y apache2-utils 
RUN a2enmod rewrite
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/Require all denied/Require all granted/' /etc/apache2/apache2.conf
RUN rm /var/www/html/index.html
COPY . /var/www/html/
CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]