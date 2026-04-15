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

