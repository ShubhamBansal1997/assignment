## Assignment
Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website. Whenever a new post published on the website, all it's subscribers shall receive an email with the post title and description in it.

How to get started?

```
$ git clone git@github.com:ShubhamBansal1997/assignment.git
$ cd assignment
```
(Make sure docker, composer and php is installed on your system)
```
$ cp .env.sample .env
$ composer install
$ ./vendor/bin/sail/ up
```
- API backend server will be running on the `localhost:80`
- Bash into the docker container (something like this example-app_laravel.test_1 or assignment_laravel.test_1)
- List all containers using ```docker ps -a```
- Bash into container ```docker exec -it example-app_laravel.test_1 /bin/bash```
- Run migrations and seeding ```php artisan migrate --seed```
- Run Queue listener ```php artisan queue:listen```

Tasks
 - [x] Write migrations store the data in required tables.
 - [x] Endpoint to publish a post on the website.
 - [x] Endpoint to make a user subscribe to the website with all the tiny validations included in it.
 - [x] Use of command to send email to subscribers(feel free to use log driver for emails).
       I think this is already maintained by the queue and there are options for retires in the queue if we chose the database option for the queue
 - [x] Use of queues to schedule sending in background.
 - [x] No duplicate stories get sent to subscribers.
       Already maintained at the code level
 - [x] Deploy the code on a public github reposi	tory.

Optional:-
-  [x] Seeded data of websites.
-  [x] Open API documentation (or) Postman collection demonstrating available APIs & their usage.
-  [x] Use of latest laravel version.
-  [ ] Use of contracts & services.
       (Didn't get this point)
-  [ ] Use of caching wherever applicable.
-  [ ] Use of events for actions like maybe subscribe him.
       (Didn't get this point)
