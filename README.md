# Detyra per Solution25

## Pershkrimi i fazes se programimit te plugin-it
### Ecuria e instalimit te Shopware 6:
	1. Instalimi i dependencies ( redis, php libs etj... )
	2. Krijimi i nje databaze "shopware" ne MySQL
	3. composer create-project shopware/production <SHOPWARE_PROJEKTI>
	4. Editimi i .env file-it ( DATABASE_URL )
	5. ./bin/console system:install --basic-setup
	6. composer require symfony/security-bundle
	7. symfony server:start -d
	8. Instalimi/Konfigurimi i Shopware Admin Panel-it (login me kredencialet: admin, shopware)

### Ecuria e krijimit te plugin-it
	1. ./bin/console plugin:create ListaProdukteve
	2. ./bin/console plugin:install --activate ListaProdukteve
	3. Programimi i plugin-it

***

## Qfare duhet te beni ju
### Ecuria e instalimit te plugin-it ( How To )
	1. Git clone repository ne foldering <SHOPWARE_PROJECT_ROOT>/custom/plugins
	2. ./bin/console plugin:refresh
	3. ./bin/console plugin:install --activate ListaProdukteve
	4. ./bin/console cache:clear
	5. ./bin/console produktet:listo
