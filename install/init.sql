CREATE TABLE usuario (
    ID int(11) NOT NULL,
    nombre varchar(255) NOT NULL
);

CREATE TABLE pregunta (
    ID int(11) NOT NULL,
    pregunta varchar(255) NOT NULL
);

CREATE TABLE respuesta (
    ID int(11) NOT NULL,
    respuesta varchar(255) NOT NULL
);

CREATE TABLE ronda (
    ID int(11) NOT NULL,
    ronda timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE relacion (
    remitente_id int(11) NOT NULL,
    destinatario_id int(11) NOT NULL,
    predunta_id int(11) NOT NULL,
    respuesta_id int(11) NOT NULL
);
