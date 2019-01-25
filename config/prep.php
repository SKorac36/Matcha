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
//      $conn->query("INSERT INTO `users` (email,username,last_name,first_name,passwd,regdate) VALUES 
//      ('billy_clinton@email.net', 'Ol Billy Boy' , 'Clinton' , 'William' ,'a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-03-30 11:39:30'),
//      ('zuma69@anc.co.uk','JehZee','Zuma','Jacob','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-08-29 12:37:22'),
//      ('jennyLaw@gravida.ca','Iamthe(Jen)Law','Lawrence','Jennifer','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-03-25 19:33:29'),
//      ('nph_stinson@penatibusetmagnis.edu','Doogie_Spouser','Harris','Neil Patrick','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-10-16 19:23:00'),
//      ('frank_ocean@infaucibusorci.edu','frankie_0cean_boi1ii','Ocean','Frank','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-10-12 19:39:33'),
//      ('Cleopatra@Namtempordiam.ca','Cleo_Patra','Philopator','Cleopatra','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 13:41:01'),
//      ('Frida_K@condimentum.org','Kahlo_Mexicana','Kahlo','Frida','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-03-20 21:54:26'),
//      ('janis_joplin@diameu.co.uk','Pearly_j','Joplin','Janis','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-07-11 23:10:14'),
//      ('Shane_Dawson@rutrumjustoPraesent.com','Dawson_TV','Yaw','Shane Lee','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-12-31 12:44:47'),
//      ('ronald_mcdonald@Aliquamfringillacursus.org','Mac_iasip','McDonald','Ronald','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-07-21 20:06:29')");
// //    ('ellenpage@enim.net','Page_Juno','Page','Ellen','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-08-22 11:12:01'),
// //     ('stenbergamandla@non.co.uk','Amandla_Stenberg','Stenberg','Amandla','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-05-19 21:03:20'),
// //   ('Jeffy_Bezos@amazon.com','Jeffy_Single_boi','Bezos','Jeff','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-04-08 05:10:32'),
// //    ('Tommy_holland@magnaLorem.org','Spider_Tom','Holland','Tom','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-05-18 04:48:11'),
// //    ('KeatonMichael@nequenonquam.org','BatVulture_Keaton','Keaton','Michael','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-03-22 05:27:20'),
// //     ('Favreau_Jon@euismodenim.co.uk','Johnny Hacky','Favreau','Jonathan','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-04-14 06:08:36'),
// //     ('zendaya@malesuadamalesuada.ca','Zendaya','Coleman','Zendaya','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-11-28 23:31:22'),
// //     ('childishGambino@diamProindolor.edu','Troy_Boy','Glover','Donald','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-09-26 07:44:26'),
// //     ('TomeiMarisa@ut.org','Marisa_Tomei','Tomei','Marisa','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-11-07 04:24:58'),
// //     ('iron_man@dapibusligulaAliquam.org','Man of Iron','Downey Jr','Robert','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-10-27 08:46:19'),
//         ('Fimmel_Travis@nulla.org','Ragnar_Travis','Fimmel','Travis','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-11-28 07:59:03'),
//      ('KatherynWinnick@et.ca','Lagertha_Shield_Maiden','Winnick','Katheryn','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-09-23 05:20:22'),
//      ('StandenClive@sed.net','FrancoRolf','Standen','Clive','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 11:20:03'),
//      ('GilSig@mifelis.org','Siggy_Gilsig','Gilsig','Jessalyn','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-04-27 07:08:01'),
//     ('Gustaf_Skarsgard@atlibero.org','Floki_Gustaf','Skarsgard','Gustaf','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-12-10 15:27:04')");
//     ('Blagden_Paul_George@nulla.org','Priest_Aethelsten','Blagden','George','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-11-28 07:59:03'),
//      ('Gabriel_Byrne@et.ca','Still_URL','Byrne','Gabriel','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-09-23 05:20:22'),
//      ('Alyssa.Sutherland@sed.net','Aslaug_Snob','Sutherland','Alyssa','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 11:20:03'),
//      ('donallogue@mifelis.org','HoricKing','Logue','Donal','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-04-27 07:08:01'),
//     ('Ludwig.Alexander@atlibero.org','XxBjorn_IronsidexX','Ludwig','Alexander','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-12-10 15:27:04')");
//     ('ApaKj.org','apAjK','Apa','KJ','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-11-28 07:59:03'),
//      ('ReinHartLili@et.ca','LOL-i-Reinharti','Reinhart','Lili','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-09-23 05:20:22'),
//      ('Mendes.Camila@sed.net','Mendes_Camila','Mendes','Camila','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 11:20:03'),
//      ('PetschMaddy@mifelis.org','PetschtMaddy','Petsch','Madeline','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-04-27 07:08:01'),
//     ('Cole_Sprouse@atlibero.org','CodyOrZack?','Cole','Sprouse','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-12-10 15:27:04')");
//     ('hendrerit.neque@nulla.org','Aliquam tincidunt, nunc','Jackson','Hanae','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-11-28 07:59:03'),
//      ('luctus@et.ca','hendrerit consectetuer,','English','Katelyn','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-09-23 05:20:22'),
//      ('Sed.malesuada.augue@sed.net','elit. Etiam','Bradley','Caesar','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 11:20:03'),
//      ('rutrum.eu.ultrices@mifelis.org','libero. Donec','Mcknight','Fuller','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-04-27 07:08:01'),
//     ('consequat@atlibero.org','Sed','Jacobs','Isabelle','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-12-10 15:27:04')");
//     ('hendrerit.neque@nulla.org','Aliquam tincidunt, nunc','Jackson','Hanae','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-11-28 07:59:03'),
//      ('luctus@et.ca','hendrerit consectetuer,','English','Katelyn','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-09-23 05:20:22'),
//      ('Sed.malesuada.augue@sed.net','elit. Etiam','Bradley','Caesar','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2017-06-07 11:20:03'),
//      ('rutrum.eu.ultrices@mifelis.org','libero. Donec','Mcknight','Fuller','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2018-04-27 07:08:01'),
//     ('consequat@atlibero.org','Sed','Jacobs','Isabelle','a1c9b2eacea32f688eb2702f399ff0794a48c1725f85d390fec5b76eff713026e1c5aafeaf30992c08791e04f6c692009c5efc1111a83da9835300f891f5907d','2019-12-10 15:27:04')");

//     $conn->query('INSERT INTO `profiles` (age,gender,preference,bio,latitude,longitude,views,likes,profile_pic,reports) VALUES 
//     (72,"Male","Straight","William Jefferson Clinton, better known as Bill Clinton (born August 19, 1946) was the 42nd president of the United States, serving from 1993 to 2001.","-25.74793","24.2293",75,34,"https://thenewswheel.com/wp-content/uploads/2015/07/Bill-Clinton-300x400.jpg",3),
//     (76,"Male","Straight","Jacob Zuma  is a South African politician who served as the fourth President of South Africa from the 2009 general election until his resignation on 14 February 2018.","-26.10765","28.05677",95,8,"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Malcolm_Turnbull_and_Jacob_Zuma_in_Jakarta_2017_11_cropped.jpg/220px-Malcolm_Turnbull_and_Jacob_Zuma_in_Jakarta_2017_11_cropped.jpg",3),
//     (28,"Female","Straight","Jen Law is an American actress. Her films have grossed over $5.7 billion worldwide, and she was the highest-paid actress in the world in 2015 and 2016. Lawrence appeared in Times 100 most influential people in the world list in 2013 and in the Forbes Celebrity 100 list in 2014 and 2016.","-26.29088","28.3228",63,50,"https://keyassets-p2.timeincuk.net/wp/prod/wp-content/uploads/sites/30/2015/11/Jennifer-Lawrence1-300x400.jpg",7),
//     (45,"Male","Gay","Neil is an American actor, writer, producer, comedian, magician, and singer. He is known primarily for his comedy roles on television and his dramatic and musical stage roles.","-26.14799","27.9630",65,31,"https://wedding-pictures.onewed.com/edgy/files/imagecache/576w/images/1039670/neil-patrick-300x400.jpg",1),
//     (31,"Male","Bisexual","Frank Ocean is an American singer, songwriter, rapper, record producer and photographer.","-26.71455","27.0970",97,44,"https://sslb.ulximg.com/image/405x405/artist/1392853723_dd7bf404602d4647b315404d9a76a123.jpg/51b237e4be36601b48a52ae35be6f890/1392853723_frank_ocean_86.jpg",7),
//     (39,"Female","Straight","Cleopatra was the last active ruler of the Ptolemaic Kingdom of Egypt, nominally survived as pharaoh by her son Caesarion","-26.15311","28.0157",72,12,"https://www.macleans.ca/wp-content/uploads/2010/04/100416_cleopatra_wide.jpg",8),
//     (47,"Female","Bisexual","Frida was a Mexican artist who painted many portraits, self-portraits and works inspired by the nature and artifacts of Mexico.","-25.8640","28.0889",67,1,"http://www.fridakahlo.org/images/frida-kahlo-picture.jpg",9),
//     (58,"Female","Bisexual","Janis Joplin nicknamed Pearl, was an American rock, soul, and blues singer and songwriter, and one of the most successful and widely known female rock stars of her era.","-26.038","27.8484",61,44,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxT8S6CDPMsLxaXVZR_2vSmDtVuIlHA5YdoE2j_5NDfKdW9Xc3",10),
//     (30,"Male","Bisexual","Shane Dawson  known professionally as Shane Dawson, is an American YouTuber, author, sketch comedian, actor, film director, media personality and musician.","-26.0944","28.2293",53,21,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlKfAset9Q-2HqIBLtwWFBCJ8wWmAh_FDw7jadFouZIxrZ74Lq",2),
//     (41,"Male","Gay","Ronald Mac McDonald is a co-owner and the bad bouncer/bodyguard of Paddys Pub and generally the pubs most active manager","-26.1586","28.0728",79,7,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtaUl3imbyq44XytAtROsfKFp-WWnVjnv2oaZmFDGpeKLn3HS_",8),
//     (31,"Female","Gay","Ellen Page is a Canadian actress and producer. Her career began with roles in Canadian television shows including Pit Pony, Trailer Park Boys, and ReGenesis.","-26.1465","27.917","https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Ellen_Page_by_Gage_Skidmore.jpg/402px-Ellen_Page_by_Gage_Skidmore.jpg",7),
//     (20,"Female","Gay","Amandla Stenberg is an American actress. She portrayed Rue in The Hunger Games; Madeline Whittier in Everything, Everything; and Starr Carter in The Hate U Give (2018).","-25.7479","28.2293","https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Amandla_Stenberg_by_Gage_Skidmore.jpg/323px-Amandla_Stenberg_by_Gage_Skidmore.jpg",2),
//     (55,"Male","Straight","Jeff Bezos is an American technology entrepreneur, investor, and philanthropist. He is the founder, chairman, CEO, and president of Amazon.","-26.2326","28.2410","https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Jeff_Bezos_at_Amazon_Spheres_Grand_Opening_in_Seattle_-_2018_%2839074799225%29_%28cropped%29.jpg/341px-Jeff_Bezos_at_Amazon_Spheres_Grand_Opening_in_Seattle_-_2018_%2839074799225%29_%28cropped%29.jpg",5),
//     (22,"Male","Straight","Tom Holland  is an English actor, voice actor, singer and dancer. A graduate of the BRIT School in London, he is known for playing Spider-Man in the Marvel Cinematic Universe (MCU).","-26.8675","28.1123","https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Tom_Holland_by_Gage_Skidmore.jpg/325px-Tom_Holland_by_Gage_Skidmore.jpg",7),
//     (67,"Male","Straight","Michael Keatonknown professionally as Michael Keaton, is an American actor, producer, and director.","-27.45564","28.01571","https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Michael_Keaton_by_Gage_Skidmore.jpg/407px-Michael_Keaton_by_Gage_Skidmore.jpg",3),
//     (52,"Male","Straight","John Favreau is an American actor, director, producer, and screenwriter","-26.57765","24.33421","https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Jon_Favreau_2016.jpeg/324px-Jon_Favreau_2016.jpeg",10),
//     (22,"Female","Straight","Zendaya is an American actress and singer. She began her career appearing as a child model and backup dancer, before gaining prominence for her role as Rocky Blue on the Disney Channel sitcom Shake It Up.","-27.89994","24.5564","https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Zendaya_promoting_Smallfoot_for_MTV_international.png/327px-Zendaya_promoting_Smallfoot_for_MTV_international.png",10),
//     (35,"Male","Straight","Donald Glover  is an American actor, comedian, singer, writer, producer, director, rapper, songwriter, and DJ.","-25.33212","26.32122","https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Donald_Glover_TIFF_2015.jpg/339px-Donald_Glover_TIFF_2015.jpg",10),
//     (54,"Female","Straight","Marisa Tomei  is an American actress. She is the recipient of various accolades including an Academy Award and nominations for a BAFTA Award, two Golden Globe Awards, and three Screen Actors Guild Awards.","-26.812455","28.07788","https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Marisa_Tomei_at_Toronto_Film_Festival_2012.jpg/387px-Marisa_Tomei_at_Toronto_Film_Festival_2012.jpg",2),
//     (53,"Male","Straight","RDJ is an American actor and singer. His career has included critical and popular success in his youth, followed by a period of substance abuse and legal difficulties, and a resurgence of commercial success in middle age.","-26.00012","27.00093","https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Robert_Downey_Jr_2014_Comic_Con_%28cropped%29.jpg/339px-Robert_Downey_Jr_2014_Comic_Con_%28cropped%29.jpg",1),
//     (39,"Male","Straight", "Travis Fimmel is an Australian actor and former model. He is known for his role as Ragnar Lothbrok in the History Channel series Vikings.", "-26.33456", "28.00015", "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Travis_Fimmel_by_Gage_Skidmore.jpg/309px-Travis_Fimmel_by_Gage_Skidmore.jpg",10),
//     (41,"Female","Bisexual", "Katheryn Winnick is a Canadian actress. She is known for her roles in Amusement (2008), Bones (2010), A Glimpse Inside the Mind of Charles Swan III (2012), Vikings (2013–present), and The Art of the Steal (2013).", "-25.899312", "26.012445", "http://fanaru.com/vikings/image/1004-vikings-katheryn-winnick-lagertha.jpg",7),
//     (37,"Male","Straight", "Clive Standen is a British actor best known for playing Bryan Mills in the NBC series Taken, based on the movie of the same name, as well as Rollo in the History Channel series Vikings.", "-26.55463", "27.0456", "https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Clive_Standenby_Gage_Skidmore.jpg/335px-Clive_Standenby_Gage_Skidmore.jpg",1),
//     (47,"Female","Straight", "Jessalyn Gilsig  is a Canadian-American actress known for her roles in television series, e.g. as Lauren Davis in Boston Public, Gina Russo in Nip/Tuck, Terri Schuester in Glee, and as Siggy Haraldson on the History Channel series Vikings.", "-26.01823", "28.00765", "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Jessalyn_Gilsig_2010.jpg/364px-Jessalyn_Gilsig_2010.jpg",2),
//     (38,"Male","Straight", "Gustaf Skarsgard is a Swedish actor. He is best known outside Scandinavia for his role as Floki in the History Channel series Vikings as well as for his roles in the films Evil (2003)", "-25.78899", "27.788667", "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Gustaf_Skarsg%C3%A5rd_2013_%28cropped%29.jpg/297px-Gustaf_Skarsg%C3%A5rd_2013_%28cropped%29.jpg",3),
//     (29,"Male","Bisexual", "George Blagden is an English stage and film actor. He is best known for his role as Louis XIV in the French-produced television series drama Versailles.", "-26.655547", "27.56748", "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/George_Blagden_2014.jpg/320px-George_Blagden_2014.jpg",10),
//     (68,"Male","Straight", "Gabriel Byrne  is an Irish actor, film director, film producer, writer, cultural ambassador and audiobook narrator", "-26.74563", "26.72894", "https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Gabriel_Byrne_2010.jpg/394px-Gabriel_Byrne_2010.jpg",1),
//     (36,"Female","Bisexual", "Alyssa Sutherland is an Australian actress and model.", "-26.74465", "26.99999", "https://images-na.ssl-images-amazon.com/images/I/51GJV5tUUFL.jpg",2),
//     (52,"Male","Straight", "Donal Logue is a Canadian-American-Irish film and television actor, producer and writer. ", "-26.00008", "27.00001", "https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Donal_Logue_at_NY_PaleyFest_2014_for_Gotham.jpg/320px-Donal_Logue_at_NY_PaleyFest_2014_for_Gotham.jpg",1),
//     (26,"Male","Straight", "Alexander Ludwig is a Canadian actor, singer and model. His notable film credits include The Seeker: The Dark Is Rising and The Hunger Games. He currently appears in the History Channel series Vikings.", "-25.87964", "28.00013", "https://vz.cnwimg.com/thumbc-300x400/wp-content/uploads/2014/11/GettyImages-464003102.jpg",10),
//     (21,"Male","Bisexual", "KJ Apa is a New Zealand actor. He is known for starring as Archie Andrews in the CW drama series Riverdale.", "-25.97856", "27.58102", "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/K.J._Apa_%2844563642331%29_%28cropped_2%29.jpg/375px-K.J._Apa_%2844563642331%29_%28cropped_2%29.jpg",3),
//     (22,"Female","Bisexual", "Lili Reinhart is an American actress, best known for portraying Betty Cooper on The CW drama series Riverdale.", "-27.1234", "28.9765", "https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/Lili_Reinhart_by_Gage_Skidmore_2.jpg/320px-Lili_Reinhart_by_Gage_Skidmore_2.jpg",4),
//     (24,"Female","Straight", "Camila Mendes is an American actress, known for portraying Veronica Lodge on The CW teen drama series Riverdale.", "-25.9281", "28.08381", "https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Camila_Mendes_by_Gage_Skidmore_2.jpg/342px-Camila_Mendes_by_Gage_Skidmore_2.jpg",3),
//     (24,"Female","Straight", "Madeline Petsch is an American actress. She is known for portraying Cheryl Blossom on The CW television series Riverdale and Marissa in F the Prom.", "-27.64537", "27.56472", "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Madelaine_Petsch_%2835736267604%29_%28cropped%29.jpg/336px-Madelaine_Petsch_%2835736267604%29_%28cropped%29.jpg",8),
//     (26,"Male","Straight", "Cole Sprouse is an American actor, and twin brother of Dylan Sprouse. He is known for his role as Cody Martin on the Disney Channel series The Suite Life of Zack & Cody and its spinoff The Suite Life on Deck.", "-26.985712", "27.053451", "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Cole_Sprouse_by_Gage_Skidmore.jpg/364px-Cole_Sprouse_by_Gage_Skidmore.jpg",5),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),
//     (age,"Gender","Preference", "bio", "latitude", "longitude", "picture",reports),

    //$conn->query('INSERT INTO `tags` (tag) VALUES
//     ("musician"),
//     ("gamer"),
//     ("coder"),
//     ("cook"),
//     ("nerd")');

    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');
    $conn->query('INSERT INTO `searches`(age_gap, distance, fame_rating, com_gap) VALUE(10,25,10,2)');

    }
    catch(PDOException $e){
        echo "Failed to populate: <br>";
        echo $e->getMessage();
    }
?>