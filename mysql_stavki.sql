CREATE TABLE Clanek (
  idClanek int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  naziv varchar(45) NOT NULL,
  vsebina varchar(255) NOT NULL,
  nazivSlike varchar(255) NOT NULL,
  kategorija enum('Humor','Zdravje','Umetnost','Novice') NOT NULL,
  tk_clanek_uporabnik int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE Clanek
    ADD CONSTRAINT tk_clanek_uporabnik_
    FOREIGN KEY (tk_clanek_uporabnik)
    REFERENCES Uporabnik(idUporabnik);

CREATE TABLE Komentar (
  idKomentar int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  vsebina text NOT NULL,
  tk_komentar_uporabnik int(11) NOT NULL,
  tk_komentar_clanek int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE Komentar
    ADD CONSTRAINT tk_komentar_uporabnik_
    FOREIGN KEY (tk_komentar_uporabnik)
    REFERENCES Uporabnik(idUporabnik);

ALTER TABLE Komentar
    ADD CONSTRAINT tk_komentar_clanek_
    FOREIGN KEY (tk_komentar_clanek)
    REFERENCES Clanek(idClanek);

CREATE TABLE Uporabnik (
  idUporabnik int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  geslo varchar(45) NOT NULL,
  email varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
