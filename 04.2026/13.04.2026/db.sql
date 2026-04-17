create or replace table boxy
(
    box_id       int unsigned auto_increment
        primary key,
    miejsca      int                               null,
    wolne        int                               null,
    typ          enum ('wewnętrzny', 'zewnętrzny') null,
    max_wielkosc float                             null
);

create or replace table rasa
(
    rasa_id int unsigned not null
        primary key,
    nazwa   varchar(100) null
);

create or replace table psy
(
    pies_id       int unsigned auto_increment
        primary key,
    imie          varchar(25)    null,
    rasa_id       int unsigned   null,
    waga          float unsigned null,
    wzrost        float unsigned null,
    data_narodzin date           null,
    box_id        int unsigned   null,
    constraint psy_boxy_box_id_fk
        foreign key (box_id) references boxy (box_id),
    constraint psy_rasa_rasa_id_fk
        foreign key (rasa_id) references rasa (rasa_id)
);


       -- BOXy
INSERT INTO boxy (miejsca, wolne, typ, max_wielkosc) VALUES
                                                         (4, 0, 'wewnętrzny', 12.0),   -- box_id 1 -> 4 psy
                                                         (3, 1, 'wewnętrzny', 20.0),   -- box_id 2 -> 2 psy
                                                         (4, 1, 'zewnętrzny', 35.0),   -- box_id 3 -> 3 psy
                                                         (2, 0, 'wewnętrzny', 10.0),   -- box_id 4 -> 2 psy
                                                         (5, 2, 'zewnętrzny', 50.0),   -- box_id 5 -> 3 psy
                                                         (3, 1, 'wewnętrzny', 25.0),   -- box_id 6 -> 2 psy
                                                         (4, 0, 'zewnętrzny', 45.0),   -- box_id 7 -> 4 psy
                                                         (5, 0, 'wewnętrzny', 8.0),    -- box_id 8 -> 5 psów
                                                         (6, 2, 'zewnętrzny', 55.0),   -- box_id 9 -> 4 psy
                                                         (4, 0, 'wewnętrzny', 18.0),   -- box_id 10 -> 4 psy
                                                         (5, 2, 'zewnętrzny', 60.0),   -- box_id 11 -> 3 psy
                                                         (4, 1, 'wewnętrzny', 30.0);   -- box_id 12 -> 3 psy

-- RASY
INSERT INTO rasa (rasa_id, nazwa) VALUES
                                      (1, 'Labrador'),
                                      (2, 'Owczarek niemiecki'),
                                      (3, 'Beagle'),
                                      (4, 'Yorkshire Terrier'),
                                      (5, 'Buldog francuski'),
                                      (6, 'Golden Retriever'),
                                      (7, 'Mieszaniec'),
                                      (8, 'Shih Tzu'),
                                      (9, 'Husky'),
                                      (10, 'Jamnik'),
                                      (11, 'Border Collie'),
                                      (12, 'Cocker Spaniel'),
                                      (13, 'Rottweiler'),
                                      (14, 'Chihuahua'),
                                      (15, 'Dalmatyńczyk'),
                                      (16, 'Pudel'),
                                      (17, 'Akita'),
                                      (18, 'Mops'),
                                      (19, 'Bernardyn'),
                                      (20, 'Maltańczyk');

-- PSY
INSERT INTO psy (imie, rasa_id, waga, wzrost, data_narodzin, box_id) VALUES
                                                                         ('Azor', 2, 34.5, 65.0, '2020-05-14', 3),
                                                                         ('Bella', 1, 28.0, 57.0, '2021-07-22', 5),
                                                                         ('Milo', 3, 12.4, 38.0, '2022-01-10', 2),
                                                                         ('Luna', 4, 3.2, 22.0, '2023-03-03', 4),
                                                                         ('Reksio', 7, 18.7, 45.0, '2019-11-18', 6),
                                                                         ('Nela', 5, 11.5, 30.0, '2022-09-09', 2),
                                                                         ('Fado', 6, 31.0, 60.0, '2020-12-01', 5),
                                                                         ('Kora', 9, 26.3, 58.0, '2021-02-17', 3),
                                                                         ('Tosia', 8, 6.1, 27.0, '2023-06-25', 1),
                                                                         ('Burek', 10, 8.9, 24.0, '2021-08-30', 6),
                                                                         ('Max', 11, 19.5, 50.0, '2020-04-12', 7),
                                                                         ('Sara', 12, 13.2, 39.0, '2022-02-05', 10),
                                                                         ('Roki', 13, 42.0, 68.0, '2018-10-20', 11),
                                                                         ('Pusia', 14, 2.8, 18.0, '2024-01-14', 8),
                                                                         ('Dora', 15, 24.6, 54.0, '2021-06-18', 7),
                                                                         ('Kajtek', 16, 9.4, 33.0, '2023-07-07', 10),
                                                                         ('Ares', 17, 36.1, 66.0, '2019-09-29', 9),
                                                                         ('Fifi', 18, 7.9, 29.0, '2022-11-13', 1),
                                                                         ('Bruno', 19, 58.0, 78.0, '2018-03-22', 11),
                                                                         ('Maja', 20, 4.2, 23.0, '2023-08-09', 8),
                                                                         ('Cezar', 2, 37.3, 67.0, '2019-01-11', 9),
                                                                         ('Gucio', 3, 11.8, 37.0, '2021-05-27', 10),
                                                                         ('Lila', 4, 3.5, 21.0, '2024-02-02', 8),
                                                                         ('Bono', 1, 29.4, 58.0, '2020-07-16', 5),
                                                                         ('Sonia', 7, 16.0, 42.0, '2022-04-08', 12),
                                                                         ('Rita', 5, 12.1, 31.0, '2021-12-19', 12),
                                                                         ('Dexter', 11, 20.3, 52.0, '2020-10-03', 7),
                                                                         ('Pimpek', 10, 7.8, 23.0, '2023-01-25', 1),
                                                                         ('Niko', 9, 27.5, 59.0, '2020-06-30', 3),
                                                                         ('Wiki', 20, 4.0, 22.0, '2024-03-12', 8),
                                                                         ('Atos', 6, 32.8, 61.0, '2019-08-14', 11),
                                                                         ('Drops', 18, 8.2, 28.0, '2022-06-06', 4),
                                                                         ('Misia', 16, 10.1, 35.0, '2021-09-01', 12),
                                                                         ('Zeus', 13, 44.5, 70.0, '2018-12-24', 9),
                                                                         ('Coco', 14, 2.5, 17.0, '2024-04-01', 8),
                                                                         ('Baster', 15, 26.2, 55.0, '2020-11-11', 7),
                                                                         ('Pako', 7, 21.4, 47.0, '2021-01-29', 1),
                                                                         ('Loki', 17, 35.0, 64.0, '2019-07-17', 9),
                                                                         ('Kleo', 12, 14.0, 40.0, '2022-08-21', 10);
