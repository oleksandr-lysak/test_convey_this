I'm using SQLite for local testing.

```shell
- git clone https://github.com/oleksandr-lysak/test_convey_this.git
- cd test_convey_this
- cp .env.example .env
- composer install
- touch database/database.sqlite
- php artisan migrate
- php artisan db:seed
- php artisan serve
```


Create a Laravel application. Use Bootstrap frontend framework for the responsive layout on all pages.
The main layout for all pages includes:

1) Header.

 - Logo (any image) and “SampleName” text on the left. It is a link to “/dashboard” page;
 - “Register” and “Login” buttons on the right, if user is not logged in. If user registered and logged in already, then on the right should be his name and “Sign out” button. It should work and make log out too.
 - Menu on the center with 3 links: Dashboard, Plans, Users (“Users” visible only for admin users, read the following instruction).

2) Footer with a copyright and a current year, it should be always actual, not hardcoded number. (“Copyright 2025 SampleName”). Footer must be always at the bottom, even if the page content is empty. If the page content is huge, footer must be under the content, not fixed.

There should be 5 pages/routes:
    1) /register. Name, email, password, confirm password, “Register” button.
    2) /login. Email, password, “Sign in” button.
    3) /dashboard. On this page user can :

- add and edit domain name (without https://, www, without links after “/”, only domain. Trim, clear it and save only domain name itself, if user inserted the full link with sub page. It should be like “google.com”, not <https://www.google.com/about>... Save only “google.com” and remove other parts of url). The domain name must be unique. If this domain was already added by another user, show an alert message about it.
If user is not logged in, /dashboard must redirect to /login page.
    4) /users. Hidden page for admin users. If user has “is_admin” = 1 value in database for users, then he can see this page. If “is_admin” = 0, the route should redirect to /dashboard, and the link should be hidden from menu.
 On this page should be a table with all registered users. There are 5 columns: id, name, email, domain, created_at, sorted by “created_at” DESC, the latest should be on the top.
Pagination is not necessary, but will be a plus, 20 users per page. Insert to the database 25 random users with random data.
    5) /plans. Create a page with 3 columns for plans. Each plan consists of its price, few features and a button “Buy” on the bottom. The button should be on the bottom always, with any amount of features (all plan cards must be the same height).
If you click on the “Buy” button, your plan will be changed. Use data from “plans” table. (read the following instruction).


Database instructions. You can create more columns, if you need, but these are neccessary:
    1) “users” table must have columns: id(autoincrement), name, email, password (hashed by Laravel, not the password itself), is_admin (0/1 values, by default = 0), plan_id ( = id in “plans” table), created_at (date and time when user was registered).
    2) “domains” table columns: id(autoincrement), user_id (= id in “users” table), domain, created_at, updated_at.
    3) “plans” table columns: id (autoincrement), plan_name,  price, features (json with few features).

Plans data:
```json
[
    {
        "plan_name": "Basic",
        "price": 10,
        "features": {
            "Storage": "10GB",
            "Users": "1 User"
        }
    },
    {
        "plan_name": "Standard",
        "price": 25,
        "features": {
            "Storage": "50GB",
            "Support": "Email & Chat Support",
            "Users": "Up to 5 Users"
        }
    },
    {
        "plan_name": "Premium",
        "price": 50,
        "features": {
            "Storage": "200GB",
            "Support": "Priority Support",
            "Daily reports",
            "Users": "Unlimited Users"
        }
    }
]
```
