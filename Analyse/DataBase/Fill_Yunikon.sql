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
insert into Tickets (id, price, Event_id) values (1, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (2, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (3, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (4, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (5, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (6, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (7, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (8, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (9, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (10, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (11, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (12, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (13, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (14, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (15, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (16, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (17, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (18, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (19, 15, 1);
insert into Tickets (id, price, Event_id) VALUES (20, 15, 1);

insert into Tickets (id, price, Event_id) VALUES (21, 20, 2);
insert into tickets (id, price, Event_id) VALUES (22, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (23, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (24, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (25, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (26, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (27, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (28, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (29, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (30, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (31, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (32, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (33, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (34, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (35, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (36, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (37, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (38, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (39, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (40, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (41, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (42, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (43, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (44, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (45, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (46, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (47, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (48, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (49, 20, 2);
insert into Tickets (id, price, Event_id) VALUES (50, 20, 2);

insert into Tickets (id, price, Event_id) VALUES (51, 30, 3);
insert into tickets (id, price, Event_id) VALUES (52, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (53, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (54, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (55, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (56, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (57, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (58, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (59, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (60, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (61, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (62, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (63, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (64, 30, 3);
insert into Tickets (id, price, Event_id) VALUES (65, 30, 3);



