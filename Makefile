APP_CONTAINER_NAME = "code_generator"

# usage
# make composer c='create-project symfony/skeleton the_spacebar'
composer:
	docker run --name ComposerContainer --rm --interactive --tty \
		--volume $(PWD):/app \
		--volume $SSH_AUTH_SOCK:/ssh-auth.sock \
		--volume /etc/passwd:/etc/passwd:ro \
		--volume /etc/group:/etc/group:ro \
		--user $(id -u):$(id -g) \
		--env SSH_AUTH_SOCK=/ssh-auth.sock \
		composer:1.6.5 $(c);

install:
	make composer c=install

start:
	docker run -it --rm --name $(APP_CONTAINER_NAME) -v $(PWD):/usr/src/app -w /usr/src/app php:7.2.7-fpm bin/console server:run 0.0.0.0:7777

stop:
	docker stop $(APP_CONTAINER_NAME)

ip:
	docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(APP_CONTAINER_NAME)

php:
	docker run -it --rm -v $(PWD):/usr/src/app -w /usr/src/app php:7.2.7-fpm $(c)