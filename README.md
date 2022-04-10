# JumiaMarket Group PHPBED Exercise

## Exercise:

Create a single page application that uses the database provided (SQLite 3) to list and
categorize country phone numbers.

Phone numbers should be categorized by country, state (valid or not valid), country code and
number.

The page should render a list of all phone numbers available in the DB. It should be possible to
filter by country and state. Pagination is an extra.
Topics to take in account:
- Try to show your OOP skills
- Code standards/clean code
- Do not use external libs like libphonenumber to validate the numbers.

## Submission 

This repository represents my submission to this exercise.

- Prequisites : 
    - php: ^8.0.2 
    - Sqlite3 driver installed on your local machine
    - composer: ^2.0.0 
- Steps to build and run the application: 
    1. clone this repository to your local machine.
    
    2. run the following commands 
        ```
        cd path/to/repo
        composer install // install dependencies
        composer test // run tests
        composer serve // start the application
        ```
    3. the app is now up and running on port `8010`, visit this link in your browser `http://localhost:8010` to start testing the app
    

## Design and implemention 


I've designed this appliation to follow the dependency injection container design pattern with auto-wiring dependencies.


Design patterns followed; DIC, Repository, FrontController.


I've built a mini app which you might think is over engineered or that I'm re-inventing the wheel, the case here is I'm showing my capabilities by implemeting design patterns myself and building almost everything from scratch.


I've tried to follow clean code and OOP SOLID principles as much as I could and avoided anti patterns as much also.


## Discussion and points to work on and improve

- Please feel free and much welcome to guide me on any bad pactice/ bad design/ things to consider or to avoid. 

- A feature I can see useful would be that the `app/dependencies.php` file could be replaced with a service registrar and all dependencies could be re-written as service providers. 
