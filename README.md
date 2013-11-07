assigment-oop2
==============

Reikia sukurti logerį, veikiantį draiverių principu. Tai reiškia jog turite galėti pasirinkti norimą įrašymo šaltinį. Logeryje turi būti panaudotas interfeisas draiverio klasės griežtumui apibrėžti. Reikalinga išpildyti bent du draiverius (gali būti failų sistema, mysql, mongodb, couchdb, redis, memcache ir kiti šaltiniai).

Naudojimas
==============
Paleidžiame composer update;

Pagal nutylėjimą veikia failų logeris. Žinutes saugo log/loggedMessages.txt faile. Vietą ir failo pavadinimą galima pakeisti klasėje FileLogger.

Naudojantis komandine eilute, galima pasirinkti Logger tipą ir zinute turini. pvz: php run.php mysql "Mano zinute i duomenu baze" - bus pasirinktas mysql loggeris ir nusiusta zinute su turiniu "Mano zinute i duomenu baze".
