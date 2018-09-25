1. Sukuriu repositorija ir parsisiunciu i sukurta folderi git,
2. Nueinu i direktorija kuria sukuriau cd "Folderis/kuri/sukuriau";

//Atidarytame folderyje paleidziu instaliuotis laravel
3. Terminalo komanda: composer create-project --prefer-dist laravel 

3.a Pataisau klaida : App/Provider vietoje - AppServiceProvider.php faile pridedu : public function boot(){Schema::defaultStringLength(191);}

//prisijungiame i db
4. Susikuriu duomenu baze

5. Susivedu duomenu bazes prisijungimus i .env failiuka IR 
config/database.php 


//apsirasome migracijas
6. susikuriame duombazes migracija: php artisan make:migration create_cars_table

7. aprasau reikalingus stulpelius migracijoje 

8. paleidziu migracija: php artisan migrate


//kuriame modeli('prijungiame nauja duomenu lentele)
9. Sukuriu Profile modeli: php artisan make:model Profile
10. app/profile.php pridedu: protected $table = "profile";


//KUriame kontroleri
11. Sukuriu controlleri masinu: php artisan make:controller CarsController --resource

12. Sukuriu route'a routes/web.php faile.


13. Aprasau masinu atvaizdavimo funkcija controlleryje (pvz: index)

14. Jei noriu naudoti Car modeli controlleryje, reikia virsuje parasyti: use App\Car;

15. Atavaizdavimo funkcijoje pasiemu visu auto duomenis ir nusiunciu i view.

16. Susikuriu view faila resources/views/cars.blade.php

17. view faile aprasau masinu atvaidavima (pageidautina graziai)

18. Sukurti repozitorija ir pasidalinti su destyoju ir draugais