/opt/curl/bin/curl --engine gost -k -X POST --data-binary @/var/www/html/test.xml --header 'Content-Type: text/xml;charset="windows-1251"' 'https://icrs.nbki.ru/products/B2BRequestServlet' > /var/www/html/result.xml