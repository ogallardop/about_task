
# About Task project purpose
This project implements the solution for the programming test with the following requirements.
## Requirements
### Functional
Create backend CRUD operations running on REST API, about Customer entity with the following information:

| Field name | Description |
|--|--|
| Name | Customer name |
| Email | Email Adress for communication purpose |
| Status | To determine the customer status (Registered, Confirmed, Removed...)  |
| Country | Country for the customer address. |
| Address | Residence address |
| PostalCode | Residence postal code |

### Non-Functional
* Would be great to see how you bootstrap the app and create the structure for a small service.
* Unit and integration tests would be great to see.

### Stack
* Don't use any framework.
* Should be plain PHP 7.* Using Symfony components.

### Infrastructure
* Runnable on docker container. including some sort of persistence layer. (MySQL or MongoDB is fine).

* A make file to build the containers and run the project so I can run the curl commands and make the requests.

* Use http kernel component [Symfony Http kernel](https://symfony.com/doc/current/components/http_kernel.html) for handling HTTP requests.

### Getting started
1. Run `make init` in the project directory:

    ```bash
    make init
    ```

    It will build the container.

2. `make up` to run the project and attach tty or `make run` to run in background. It will be accessible on `http://localhost`

### CURL Examples
