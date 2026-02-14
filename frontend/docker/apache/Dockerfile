FROM httpd:2.4

# Habilita rewrite
RUN sed -i '/LoadModule rewrite_module/s/^#//g' /usr/local/apache2/conf/httpd.conf

# Permite .htaccess
RUN printf '\n<Directory "/usr/local/apache2/htdocs">\n\
    AllowOverride All\n\
</Directory>\n' >> /usr/local/apache2/conf/httpd.conf
