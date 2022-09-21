<?php
/**
 * need to install postfix ,
 * setting : php.ini
 * SMTP = localhost
 * smtp_port = 25
 * sendmail_from = me@example.com
 */
mail("test@gmail.com", "My subject", 'test');


