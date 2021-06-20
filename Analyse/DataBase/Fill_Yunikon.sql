-- Author : Cyprien Jaquier
-- Date 17.05.2021
-- project : Yunikon

-- Script to fill the DB

-- Users
insert into Users (id, eMail, password, phoneNumber, name, lastName, exhibitor) values (1, 'a@a.a', '$2y$10$x1wUVLfLn04XThqvyLtlFugQVBybFyl17By8ColH2Eu7GXGGc3.1q', '123', 'a', 'a', 1);
insert into Users (id, eMail, password, phoneNumber, name, lastName, exhibitor) values (2, 'b@b.b', '$2y$10$Be3CBqSfdPmy/7vF2FwBGORZPSamT9idT347zVBF2u35cNQlU0wZK', '321', 'b', 'b', 0); 	

-- Events
insert into Events (id, name, startingDate, endingDate, location, description, image, Users_id) values (1, 'Polymanga', '2019-04-19', '2019-04-22', '2M2C Montreux', 'Polymanga est une convention qui se consacre le temps d\'un week-end à la culture japonaise, aux mangas, aux animes et aux jeux vidéo. Un programme de divertissements pour petits et grands, un véritable plongeon dans la culture pop nippone !', 'view/content/events/images/Polymanga.png', 1);
insert into Events (id, name, startingDate, endingDate, location, description, image, Users_id) values (2, 'Japan Impact', '2021-06-15', '2021-06-29', 'EPFL', 'Japan Impact est une convention dédiée à la culture japonaise qui se déroule tous les ans sur un week-end à l\'École polytechnique fédérale de Lausanne.', 'view/content/events/images/Japan_Impact.png', 1);
insert into Events (id, name, startingDate, endingDate, location, description, image, Users_id) values (3, 'Japan Expo', '2022-07-14', '2022-07-17', 'Paris', 'Japan Expo est LE rendez-vous des amoureux du Japon et de sa culture, du manga aux arts martiaux, du jeu vidéo au folklore nippon. un évènement incontournable pour tous ceux qui s’intéressent à la culture japonaise.', 'view/content/events/images/japan-expo.jpg', 1);

-- Tickets
insert into Tickets (id, price, Event_id, u_number) values (1, 15, 1, 1);
insert into Tickets (id, price, Event_id, u_number) VALUES (2, 15, 1, 2);
insert into Tickets (id, price, Event_id, u_number) VALUES (3, 15, 1, 3);
insert into Tickets (id, price, Event_id, u_number) VALUES (4, 15, 1, 4);
insert into Tickets (id, price, Event_id, u_number) VALUES (5, 15, 1, 5);
insert into Tickets (id, price, Event_id, u_number) VALUES (6, 15, 1, 6);
insert into Tickets (id, price, Event_id, u_number) VALUES (7, 15, 1, 7);
insert into Tickets (id, price, Event_id, u_number) VALUES (8, 15, 1, 8);
insert into Tickets (id, price, Event_id, u_number) VALUES (9, 15, 1, 9);
insert into Tickets (id, price, Event_id, u_number) VALUES (10, 15, 1, 10);
insert into Tickets (id, price, Event_id, u_number) VALUES (11, 15, 1, 11);
insert into Tickets (id, price, Event_id, u_number) VALUES (12, 15, 1, 12);
insert into Tickets (id, price, Event_id, u_number) VALUES (13, 15, 1, 13);
insert into Tickets (id, price, Event_id, u_number) VALUES (14, 15, 1, 14);
insert into Tickets (id, price, Event_id, u_number) VALUES (15, 15, 1, 15);
insert into Tickets (id, price, Event_id, u_number) VALUES (16, 15, 1, 16);
insert into Tickets (id, price, Event_id, u_number) VALUES (17, 15, 1, 17);
insert into Tickets (id, price, Event_id, u_number) VALUES (18, 15, 1, 18);
insert into Tickets (id, price, Event_id, u_number) VALUES (19, 15, 1, 29);
insert into Tickets (id, price, Event_id, u_number) VALUES (20, 15, 1, 20);
insert into Tickets (id, price, Event_id, u_number) VALUES (21, 20, 2, 21);
insert into tickets (id, price, Event_id, u_number) VALUES (22, 20, 2, 22);
insert into Tickets (id, price, Event_id, u_number) VALUES (23, 20, 2, 23);
insert into Tickets (id, price, Event_id, u_number) VALUES (24, 20, 2, 24);
insert into Tickets (id, price, Event_id, u_number) VALUES (25, 20, 2, 25);
insert into Tickets (id, price, Event_id, u_number) VALUES (26, 20, 2, 26);
insert into Tickets (id, price, Event_id, u_number) VALUES (27, 20, 2, 27);
insert into Tickets (id, price, Event_id, u_number) VALUES (28, 20, 2, 28);
insert into Tickets (id, price, Event_id, u_number) VALUES (29, 20, 2, 29);
insert into Tickets (id, price, Event_id, u_number) VALUES (30, 20, 2, 30);
insert into Tickets (id, price, Event_id, u_number) VALUES (31, 20, 2, 31);
insert into Tickets (id, price, Event_id, u_number) VALUES (32, 20, 2, 32);
insert into Tickets (id, price, Event_id, u_number) VALUES (33, 20, 2, 33);
insert into Tickets (id, price, Event_id, u_number) VALUES (34, 20, 2, 34);
insert into Tickets (id, price, Event_id, u_number) VALUES (35, 20, 2, 35);
insert into Tickets (id, price, Event_id, u_number) VALUES (36, 20, 2, 36);
insert into Tickets (id, price, Event_id, u_number) VALUES (37, 20, 2, 37);
insert into Tickets (id, price, Event_id, u_number) VALUES (38, 20, 2, 38);
insert into Tickets (id, price, Event_id, u_number) VALUES (39, 20, 2, 39);
insert into Tickets (id, price, Event_id, u_number) VALUES (40, 20, 2, 40);
insert into Tickets (id, price, Event_id, u_number) VALUES (41, 20, 2, 41);
insert into Tickets (id, price, Event_id, u_number) VALUES (42, 20, 2, 42);
insert into Tickets (id, price, Event_id, u_number) VALUES (43, 20, 2, 43);
insert into Tickets (id, price, Event_id, u_number) VALUES (44, 20, 2, 44);
insert into Tickets (id, price, Event_id, u_number) VALUES (45, 20, 2, 45);
insert into Tickets (id, price, Event_id, u_number) VALUES (46, 20, 2, 46);
insert into Tickets (id, price, Event_id, u_number) VALUES (47, 20, 2, 47);
insert into Tickets (id, price, Event_id, u_number) VALUES (48, 20, 2, 48);
insert into Tickets (id, price, Event_id, u_number) VALUES (49, 20, 2, 49);
insert into Tickets (id, price, Event_id, u_number) VALUES (50, 20, 2, 50);

insert into Tickets (id, price, Event_id, u_number) VALUES (51, 30, 3, 51);
insert into tickets (id, price, Event_id, u_number) VALUES (52, 30, 3, 52);
insert into Tickets (id, price, Event_id, u_number) VALUES (53, 30, 3, 53);
insert into Tickets (id, price, Event_id, u_number) VALUES (54, 30, 3, 54);
insert into Tickets (id, price, Event_id, u_number) VALUES (55, 30, 3, 55);
insert into Tickets (id, price, Event_id, u_number) VALUES (56, 30, 3, 56);
insert into Tickets (id, price, Event_id, u_number) VALUES (57, 30, 3, 57);
insert into Tickets (id, price, Event_id, u_number) VALUES (58, 30, 3, 58);
insert into Tickets (id, price, Event_id, u_number) VALUES (59, 30, 3, 59);
insert into Tickets (id, price, Event_id, u_number) VALUES (60, 30, 3, 60);
insert into Tickets (id, price, Event_id, u_number) VALUES (61, 30, 3, 61);
insert into Tickets (id, price, Event_id, u_number) VALUES (62, 30, 3, 62);
insert into Tickets (id, price, Event_id, u_number) VALUES (63, 30, 3, 63);
insert into Tickets (id, price, Event_id, u_number) VALUES (64, 30, 3, 64);
insert into Tickets (id, price, Event_id, u_number) VALUES (65, 30, 3, 65);



