<?php
require_once('database.php');
try {
    $conn = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("use `$DB_NAME`");
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage() . PHP_EOL;
    die();
}
try{ //need to change this so i have unique users
     $conn->query("INSERT INTO `users` (email,username,last_name,first_name,passwd,regdate) VALUES 
     ('billy_clinton@email.net', 'Ol Billy Boy' , 'Clinton' , 'William' ,'a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-03-30 11:39:30'),
     ('zuma69@anc.co.uk','JehZee','Zuma','Jacob','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-08-29 12:37:22'),
     ('jennyLaw@gravida.ca','Iamthe(Jen)Law','Lawrence','Jennifer','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-03-25 19:33:29'),
     ('nph_stinson@penatibusetmagnis.edu','Doogie_Spouser','Harris','Neil Patrick','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-10-16 19:23:00'),
     ('frank_ocean@infaucibusorci.edu','frankie_0cean_boi1ii','Ocean','Frank','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-10-12 19:39:33'),
     ('Cleopatra@Namtempordiam.ca','Cleo_Patra','Philopator','Cleopatra','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 13:41:01'),
     ('elit@condimentum.org','ut, nulla.','Richardson','Minerva','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-03-20 21:54:26'),
     ('nec.tempus@diameu.co.uk','lobortis','Sanford','Bethany','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-07-11 23:10:14'),
     ('amet.orci@rutrumjustoPraesent.com','Sed malesuada','Hood','August','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-12-31 12:44:47'),
     ('non.enim@Aliquamfringillacursus.org','Curabitur sed','Moses','Jennifer','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-07-21 20:06:29'),
     ('nisl@enim.net','est, mollis','Matthews','India','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-08-22 11:12:01'),
     ('Proin@non.co.uk','posuere at,','Dalton','David','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-05-19 21:03:20'),
     ('semper.rutrum@accumsaninterdum.edu','nec','Sanford','Constance','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-04-08 05:10:32'),
     ('Cum.sociis@magnaLorem.org','euismod mauris','Deleon','Akeem','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-05-18 04:48:11'),
     ('a@nequenonquam.org','id, mollis nec,','Suarez','Armando','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-03-22 05:27:20'),
     ('tincidunt.nibh.Phasellus@euismodenim.co.uk','Aliquam nec enim.','Erickson','Tanner','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-04-14 06:08:36'),
     ('non.feugiat@malesuadamalesuada.ca','nisl arcu','Leon','Leilani','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-11-28 23:31:22'),
     ('tincidunt@diamProindolor.edu','facilisis','Best','Melvin','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-09-26 07:44:26'),
     ('Quisque.tincidunt.pede@ut.org','Ut','Webster','Bradley','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-11-07 04:24:58'),
     ('dignissim.pharetra@dapibusligulaAliquam.org','egestas,','Ware','Desiree','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-10-27 08:46:19'),
     ('hendrerit.neque@nulla.org','Aliquam tincidunt, nunc','Jackson','Hanae','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-11-28 07:59:03'),
     ('luctus@et.ca','hendrerit consectetuer,','English','Katelyn','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-09-23 05:20:22'),
     ('Sed.malesuada.augue@sed.net','elit. Etiam','Bradley','Caesar','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 11:20:03'),
     ('rutrum.eu.ultrices@mifelis.org','libero. Donec','Mcknight','Fuller','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-04-27 07:08:01'),
     ('consequat@atlibero.org','Sed','Jacobs','Isabelle','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-12-10 15:27:04')");
    $conn->query('INSERT INTO `profiles` (age,gender,preference,bio,latitude,longitude,views,likes,profile_pic,reports) VALUES 
    (72,"Male","Straight","William Jefferson Clinton, better known as Bill Clinton (born August 19, 1946) was the 42nd president of the United States, serving from 1993 to 2001.","-25.74793","24.2293",75,34,"https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwixlPCnmPDfAhVIrxoKHbMHDBwQjRx6BAgBEAU&url=http%3A%2F%2Fbodysize.org%2Fen%2Fbill-clinton%2F&psig=AOvVaw1o9az00Cfy449tPC3sUSA-&ust=1547655522956462",3),
    (76,"Male","Straight","Jacob Zuma  is a South African politician who served as the fourth President of South Africa from the 2009 general election until his resignation on 14 February 2018.","-26.10765","28.05677",95,8,"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Malcolm_Turnbull_and_Jacob_Zuma_in_Jakarta_2017_11_cropped.jpg/220px-Malcolm_Turnbull_and_Jacob_Zuma_in_Jakarta_2017_11_cropped.jpg",3),
    (28,"Female","Straight","Jen Law is an American actress. Her films have grossed over $5.7 billion worldwide, and she was the highest-paid actress in the world in 2015 and 2016. Lawrence appeared in Times 100 most influential people in the world list in 2013 and in the Forbes Celebrity 100 list in 2014 and 2016.","-26.29088","28.3228",63,50,"https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwigy-yEn_DfAhUBgRoKHaf_DNkQjRx6BAgBEAU&url=https%3A%2F%2Fwww.celebsnow.co.uk%2Ftag%2Fjennifer-lawrence&psig=AOvVaw3kbtXrHC9SkjsM_LLJP7xE&ust=1547657345760378",7),
    (45,"Male","Gay","Neil is an American actor, writer, producer, comedian, magician, and singer. He is known primarily for his comedy roles on television and his dramatic and musical stage roles.","-26.14799","27.9630",65,31,"https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjSjbaXoPDfAhUQtRoKHRQoDNQQjRx6BAgBEAU&url=http%3A%2F%2Fgreginhollywood.com%2Fneil-patrick-harris-on-one-day-hosting-the-oscars-i-dont-think-my-movie-cred-is-what-it-should-be-42207&psig=AOvVaw38K53NwqYGq_o5F7QojZ2Y&ust=1547657651941311",1),
    (31,"Male","Bisexual","Frank Ocean is an American singer, songwriter, rapper, record producer and photographer.","-26.71455","27.0970",97,44,"https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjC5sG3oPDfAhVJdhoKHaibDlYQjRx6BAgBEAU&url=http%3A%2F%2Fbodysize.org%2Fen%2Ffrank-ocean%2F&psig=AOvVaw3KnHX4pL1MVKU0n8bK0JX6&ust=1547657719058441",7),
    (39,"Female","Straight","Cleopatra was the last active ruler of the Ptolemaic Kingdom of Egypt, nominally survived as pharaoh by her son Caesarion","-26.15311","28.0157",72,12,"https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwiq16SeovDfAhVLyYUKHfCnDzAQjRx6BAgBEAU&url=https%3A%2F%2Fcinematicpassions.wordpress.com%2Fcategory%2Felizabeth-taylor%2F&psig=AOvVaw2TvirW2pHa1Af15bc1qSKG&ust=1547658194653929",8),
    (47,"Female","Bisexual","cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem,","16.94122","-11.54666",67,1,"http://lorempixel.com/300/400/people/",9),
    (58,"Female","Bisexual","felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend","-87.43468","-92.81472",61,44,"http://lorempixel.com/300/400/people/",10),
    (35,"Male","Bisexual","Curabitur egestas nunc sed libero. Proin sed turpis nec mauris","-9.20978","47.68207",53,21,"http://lorempixel.com/300/400/people/",2),
    (58,"Male","Gay","arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada","46.63406","-147.88133",79,7,"http://lorempixel.com/300/400/people/",8)');
    
      
    }
    catch(PDOException $e){
        echo "Failed to populate: <br>";
        echo $e->getMessage();
    }
?>