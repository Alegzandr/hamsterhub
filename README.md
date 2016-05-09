HamsterHub
==========
By Alexandre Farrenq & Clara Fourcade

# How to install ?
- composer install
- php app/console doctrine:database:create
- php app/console doctrine:schema:update --force

# How to load fixtures ?
- php app/console doctrine:fixtures:load