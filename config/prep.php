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
     ('Frida_K@condimentum.org','Kahlo_Mexicana','Kahlo','Frida','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-03-20 21:54:26'),
     ('janis_joplin@diameu.co.uk','Pearly_j','Joplin','Janis','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-07-11 23:10:14'),
     ('Shane_Dawson@rutrumjustoPraesent.com','Dawson_TV','Yaw','Shane Lee','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-12-31 12:44:47'),
     ('ronald_mcdonald@Aliquamfringillacursus.org','Mac_iasip','McDonald','Ronald','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-07-21 20:06:29')
    --  ('nisl@enim.net','est, mollis','Matthews','India','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-08-22 11:12:01'),
    --  ('Proin@non.co.uk','posuere at,','Dalton','David','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-05-19 21:03:20'),
    --  ('semper.rutrum@accumsaninterdum.edu','nec','Sanford','Constance','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-04-08 05:10:32'),
    --  ('Cum.sociis@magnaLorem.org','euismod mauris','Deleon','Akeem','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-05-18 04:48:11'),
    --  ('a@nequenonquam.org','id, mollis nec,','Suarez','Armando','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-03-22 05:27:20'),
    --  ('tincidunt.nibh.Phasellus@euismodenim.co.uk','Aliquam nec enim.','Erickson','Tanner','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-04-14 06:08:36'),
    --  ('non.feugiat@malesuadamalesuada.ca','nisl arcu','Leon','Leilani','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-11-28 23:31:22'),
    --  ('tincidunt@diamProindolor.edu','facilisis','Best','Melvin','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-09-26 07:44:26'),
    --  ('Quisque.tincidunt.pede@ut.org','Ut','Webster','Bradley','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-11-07 04:24:58'),
    --  ('dignissim.pharetra@dapibusligulaAliquam.org','egestas,','Ware','Desiree','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-10-27 08:46:19'),
    --  ('hendrerit.neque@nulla.org','Aliquam tincidunt, nunc','Jackson','Hanae','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-11-28 07:59:03'),
    --  ('luctus@et.ca','hendrerit consectetuer,','English','Katelyn','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-09-23 05:20:22'),
    --  ('Sed.malesuada.augue@sed.net','elit. Etiam','Bradley','Caesar','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 11:20:03'),
    --  ('rutrum.eu.ultrices@mifelis.org','libero. Donec','Mcknight','Fuller','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-04-27 07:08:01'),
    --  ('consequat@atlibero.org','Sed','Jacobs','Isabelle','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-12-10 15:27:04')");
    $conn->query('INSERT INTO `profiles` (age,gender,preference,bio,latitude,longitude,views,likes,profile_pic,reports) VALUES 
    (72,"Male","Straight","William Jefferson Clinton, better known as Bill Clinton (born August 19, 1946) was the 42nd president of the United States, serving from 1993 to 2001.","-25.74793","24.2293",75,34,"https://thenewswheel.com/wp-content/uploads/2015/07/Bill-Clinton-300x400.jpg",3),
    (76,"Male","Straight","Jacob Zuma  is a South African politician who served as the fourth President of South Africa from the 2009 general election until his resignation on 14 February 2018.","-26.10765","28.05677",95,8,"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Malcolm_Turnbull_and_Jacob_Zuma_in_Jakarta_2017_11_cropped.jpg/220px-Malcolm_Turnbull_and_Jacob_Zuma_in_Jakarta_2017_11_cropped.jpg",3),
    (28,"Female","Straight","Jen Law is an American actress. Her films have grossed over $5.7 billion worldwide, and she was the highest-paid actress in the world in 2015 and 2016. Lawrence appeared in Times 100 most influential people in the world list in 2013 and in the Forbes Celebrity 100 list in 2014 and 2016.","-26.29088","28.3228",63,50,"https://keyassets-p2.timeincuk.net/wp/prod/wp-content/uploads/sites/30/2015/11/Jennifer-Lawrence1-300x400.jpg",7),
    (45,"Male","Gay","Neil is an American actor, writer, producer, comedian, magician, and singer. He is known primarily for his comedy roles on television and his dramatic and musical stage roles.","-26.14799","27.9630",65,31,"https://wedding-pictures.onewed.com/edgy/files/imagecache/576w/images/1039670/neil-patrick-300x400.jpg",1),
    (31,"Male","Bisexual","Frank Ocean is an American singer, songwriter, rapper, record producer and photographer.","-26.71455","27.0970",97,44,"https://sslb.ulximg.com/image/405x405/artist/1392853723_dd7bf404602d4647b315404d9a76a123.jpg/51b237e4be36601b48a52ae35be6f890/1392853723_frank_ocean_86.jpg",7),
    (39,"Female","Straight","Cleopatra was the last active ruler of the Ptolemaic Kingdom of Egypt, nominally survived as pharaoh by her son Caesarion","-26.15311","28.0157",72,12,"https://www.macleans.ca/wp-content/uploads/2010/04/100416_cleopatra_wide.jpg",8),
    (47,"Female","Bisexual","Frida was a Mexican artist who painted many portraits, self-portraits and works inspired by the nature and artifacts of Mexico.","-25.8640","28.0889",67,1,"http://www.fridakahlo.org/images/frida-kahlo-picture.jpg",9),
    (58,"Female","Bisexual","Janis Joplin nicknamed Pearl, was an American rock, soul, and blues singer and songwriter, and one of the most successful and widely known female rock stars of her era.","-26.038","27.8484",61,44,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxT8S6CDPMsLxaXVZR_2vSmDtVuIlHA5YdoE2j_5NDfKdW9Xc3",10),
    (30,"Male","Bisexual","Shane Dawson  known professionally as Shane Dawson, is an American YouTuber, author, sketch comedian, actor, film director, media personality and musician.","-26.0944","28.2293",53,21,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlKfAset9Q-2HqIBLtwWFBCJ8wWmAh_FDw7jadFouZIxrZ74Lq",2),
    (41,"Male","Gay","Ronald Mac McDonald is a co-owner and the bad bouncer/bodyguard of Paddys Pub and generally the pubs most active manager","-26.1586","28.0728",79,7,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtaUl3imbyq44XytAtROsfKFp-WWnVjnv2oaZmFDGpeKLn3HS_",8)');
    
      
    }
    catch(PDOException $e){
        echo "Failed to populate: <br>";
        echo $e->getMessage();
    }
?>