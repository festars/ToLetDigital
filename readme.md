# Tolet Digital

# Contributing

- Do a git clone.
- Create a database `tolet`
- Copy .env.example to .env `cp .env.example .env`
- Run a `composer update`
- Run an `npm install`
- Run `php artisan migrate`
- To run the app `php artisan serve`


# Effect on changes

Any change that is done on `maste` branch will be reflect on [Devmaurice website](http://tolet.devmaurice.com)

while any change done on production will be viewed on [Etenant website](http://etenant.toletdigital.com)

# Flow of work.
- Create a branch `feature-branch` like ` git checkout -b feature-branch`
- make changes to this branch 
- make a pull request to `master` branch and preview on [Devmaurice website](http://tolet.devmaurice.com). The code is set up to deploy on push.
- Make another pull request to `production` and merge. On merge it will push the code to [Etenant website](http://etenant.toletdigital.com)         server

