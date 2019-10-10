###################
Sistema OTB Maica
###################

Sistema de cobro y control de lecturas de consumo de agua potable

*******************
Herramientas utilizadas
*******************

Servidor:
	-  Xampp 3.2.2
	-  Version PHP 5.6.30
	-  Version MySql 5.7.17

Framework:
	-  Codeigniter 3.1.10

Libreria:
	-  Bootstrap 4.3

**************************
Instalacion
**************************

Clonar repositorio
	```
	git clone https://github.com/envidiasinc/otbmaica.git
	```

*******************
Configuracion para envio de emails
*******************

Configuracion en php.ini
	- smtp_port = 587
	- sendmail_from = *******@hotmail.com
	- send_path = ""C:/xampp/sendmail/sendmail.exe"-t"

Configuracion en sendmail.ini
	- smtp_server = smtp.live.com
	- smtp_port = 587
	- smtp_ssl = TLS
	- auth_username = *******@hotmail.com
	- auth_password = **********
