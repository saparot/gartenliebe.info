ide-helper:
	@php artisan ide-helper:generate
	@php artisan ide-helper:models
	@php artisan ide-helper:meta

database-migrate:
	@php artisan migrate

dev-database-migrate:
	@php artisan migrate:refresh --seed

db-shell:
	@php artisan tinker

cache-clear:
	@php artisan cache:clear
	@php artisan route:clear
	@php artisan view:clear

dev-phpstan:
	@./vendor/bin/phpstan analyse --memory-limit=2G
