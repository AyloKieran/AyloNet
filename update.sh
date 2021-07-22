git stash --include-untracked
git reset --hard
git clean -fd
git pull 

composer install -n --optimize-autoloader --no-dev
php artisan migrate
npm run prod

php artisan config:clear
php artisan route:clear