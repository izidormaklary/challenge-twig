# DI challenge

Intro to the theory of dependency injection

### Learning objectives
    Understand the value of a Dependency Injection Layer
    Use the DI container inside Symfony
    Knows how to configure services and dependencies


### Mission

1. Creating a transform interface for:
    * a service that capitalizes each second character of a message
    * a service that puts dashes instead of spaces in the message
    
_Each should have a transform method that accepts and returns a string_

2. Creating a logger service that uses one of the transforms (polymorphism)

It should log the messages, in a file: public/log.info

3. The webpage should contain a form:
    * input field for the message to be logged
    * dropdown for selecting which transform service should be used (injected)
    
and also output the logged message.

4. The controller handles the message via the masterclass that puts the services together.

## Getting started

_if you want to run the project locally..._

Requirements:
* have composer installed
* have symfony installed

1. in the project folder (DI_CHALLENGE/) run the composer installation

```bash
composer install
```

2. edit the .env file inside the project folder

```
# fill in your database connection
DATABASE_URL="mysql://userName:password@127.0.0.1:3306/databaseName?serverVersion=5.7"
# you can decide between running it in production or developement mode
APP_ENV=prod/dev 
```

3. you are ready to host it!
   * set up your own localhost
   * or run the following command in the project folder

```bash
symfony serve
```