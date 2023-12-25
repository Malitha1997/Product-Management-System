How to clone?

1.Run git clone <git repository code>    
2.Run composer install    
3.Run cp .env.example .env        
4.Run php artisan key:generate    (Put the generated key to .env->APP_KEY)    
5.Run php artisan migrate    
6.Run php artisan serve    
7.Go to link 127.0.0.1:8000/    
    
Note : Before run the "php artisan migrate" you should make a database in localhost and change the database name in .env->DB_DATABASE.    

