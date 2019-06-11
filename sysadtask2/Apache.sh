DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
cd $DIR

$x=1
for $x in 1 2 3 4 
do
mkdir -p /var/www/html/cern$x.com/public_html
cp Node1.php /var/www/html/cern$x.com/public_html/index.php
chown -R www-data:www-data /var/www/html/cern$x.com
done

mkdir -p /var/www/html/addrequest.com/public_html
cp LoadBalancer.html /var/www/html/addrequest.com/public_html/index.html
cp cernserver.php /var/www/html/addrequest.com/public_html
chown -R www-data:www-data /var/www/html/addrequest.com

chmod -R 755 /var/www/html

cd /etc/apache2/sites-available
a2dissite 000-default.conf

cpath="cern1.com.conf"
touch $cpath
echo "<VirtualHost *:81>
 
ServerAdmin admin@cern1.com
ServerName  cern1.com
DocumentRoot /var/www/html/cern1.com/public_html
 
ErrorLog \${APACHE_LOG_DIR}/cern1.com_error.log
CustomLog \${APACHE_LOG_DIR}/cern1.com_access.log combined
 
</VirtualHost>" >$cpath


cpath="cern2.com.conf"
touch $cpath
echo "<VirtualHost *:82>
 
ServerAdmin admin@cern2.com
ServerName  cern2.com
DocumentRoot /var/www/html/cern2.com/public_html
 
ErrorLog \${APACHE_LOG_DIR}/cern2.com_error.log
CustomLog \${APACHE_LOG_DIR}/cern2.com_access.log combined
 
</VirtualHost>" >$cpath


cpath="cern3.com.conf"
touch $cpath
echo "<VirtualHost *:83>
 
ServerAdmin admin@cern3.com
ServerName  cern3.com
DocumentRoot /var/www/html/cern3.com/public_html
 
ErrorLog \${APACHE_LOG_DIR}/cern3.com_error.log
CustomLog \${APACHE_LOG_DIR}/cern3.com_access.log combined
 
</VirtualHost>" >$cpath


cpath="cern4.com.conf"
touch $cpath
echo "<VirtualHost *:84>
 
ServerAdmin admin@cern4.com
ServerName  cern4.com
DocumentRoot /var/www/html/cern4.com/public_html
 
ErrorLog \${APACHE_LOG_DIR}/cern4.com_error.log
CustomLog \${APACHE_LOG_DIR}/cern4.com_access.log combined
 
</VirtualHost>" >$cpath


cpath="addrequest.com.conf"
touch $cpath
echo "<VirtualHost *:85>
 
ServerAdmin admin@addrequest.com
ServerName  addrequest.com
DocumentRoot /var/www/html/addrequest.com/public_html
 
ErrorLog \${APACHE_LOG_DIR}/addrequest.com_error.log
CustomLog \${APACHE_LOG_DIR}/addrequest.com_access.log combined
 
</VirtualHost>" >$cpath


a2ensite cern1.com.conf
a2ensite cern2.com.conf
a2ensite cern3.com.conf
a2ensite cern4.com.conf
a2ensite addrequest.com.conf

cd /etc/apache2
cpath="ports.conf";
echo "Listen 81
Listen 82
Listen 83
Listen 84
Listen 85" >$cpath

/etc/init.d/apache2 restart